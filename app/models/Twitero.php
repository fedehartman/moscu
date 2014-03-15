<?php

class Twitero extends Eloquent {

	protected $softDelete = true;
	
	protected $table = 'twiteros';

	static function votoAlTwitero($tweet){
		foreach ($tweet->entities->user_mentions as $mencion) {
			if(!Categoria::mencionEsSponsor($mencion->screen_name)){
				$twitero = Twitero::cargarDatosTwitero($mencion);
				return $twitero->id;
			}
		}

		return NULL;
    }

    static function votoAlTwiteroDelTweet($tw_id){
    	$connection = new TwitterOAuth(Config::get('twitter.CONSUMER_KEY'), Config::get('twitter.CONSUMER_SECRET'));
		$tweet = $connection->get('statuses/show', array('id' => $tw_id));

		if (!isset($tweet->errors)) {
			// links q son de twitter
			$url = str_replace('https://twitter.com/', '', $tweet->entities->urls[0]->expanded_url);
			$url = str_replace('http://twitter.com/', '', $url);
			// links de favstar
			$url = str_replace('http://favstar.fm/users/', '', $url);

			$screen_name = explode('/', $url);
			$tweet_ano_id = explode('/', $url);

			$tweet_ano = NULL;
			$tw_ano = $connection->get('statuses/show', array('id' => end($tweet_ano_id)));
			if (!isset($tw_ano->errors)) {
				$tweet_ano = Tweet::guardarTweetAno($tw_ano);
			}

			$mencion = $connection->get('users/show', array('screen_name' => $screen_name[0]));

			if($mencion){
				if (!isset($mencion->errors)) {
					// Log::error($url);
					$twitero = Twitero::cargarDatosTwitero($mencion);
					return array('twitero_id' => $twitero->id, 'tweet_id' => $tweet_ano);
				}			
			}
		}
		return NULL;
    }

    static function cargarDatosTwitero($mencion){
		$twitero = Twitero::where('tw_id', $mencion->id_str)->first();
		if(!$twitero){
            $twitero = new Twitero;
            $twitero->tw_id = $mencion->id_str;
            $twitero->usuario = $mencion->screen_name;
            $twitero->nombre = $mencion->name;
            $twitero->save();
		}
		return $twitero;
    }

}