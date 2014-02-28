<?php

class Tweet extends Eloquent {

	protected $softDelete = true;
	
	protected $table = 'tweets';

	static function guardarVoto($tweet, $categoria_id, $twitero_id, $tweet_id){
      	$tweet_bd = Tweet::where('tw_id', $tweet->id_str)->first();
      	if(!$tweet_bd){
            $tweet_bd = new Tweet;
            $tweet_bd->categoria_id = $categoria_id;
            $tweet_bd->twitero_id = $twitero_id;
            $tweet_bd->tweet_id = $tweet_id;
            $tweet_bd->tw_id = $tweet->id_str;
            $tweet_bd->texto = $tweet->text;
            $tweet_bd->fecha = date('Y-m-d H:i:s', strtotime($tweet->created_at));
            $tweet_bd->tw_id_usuario = $tweet->user->id_str;
            $tweet_bd->tw_nombre_usuario = $tweet->user->name;
            $tweet_bd->tw_usuario = $tweet->user->screen_name;
            $tweet_bd->voto_repetido = 0;
            $tweet_bd->tweet_ano = 0;
            $tweet_bd->save();
      	}else{
      		$tweet_bd->categoria_id = $categoria_id;
            $tweet_bd->twitero_id = $twitero_id;
            $tweet_bd->tweet_id = $tweet_id;
            $tweet_bd->tw_id = $tweet->id_str;
            $tweet_bd->texto = $tweet->text;
            $tweet_bd->fecha = date('Y-m-d H:i:s', strtotime($tweet->created_at));
            $tweet_bd->tw_id_usuario = $tweet->user->id_str;
            $tweet_bd->tw_nombre_usuario = $tweet->user->name;
            $tweet_bd->tw_usuario = $tweet->user->screen_name;
            $tweet_bd->voto_repetido = 0;
            $tweet_bd->tweet_ano = 0;
            $tweet_bd->save();
      	}
      	return $tweet_bd;
    }

    static function guardarTweetAno($tweet){
        $tweet_bd = Tweet::where('tw_id', $tweet->id_str)->first();
        if(!$tweet_bd){
            $tweet_bd = new Tweet;
            $tweet_bd->tw_id = $tweet->id_str;
            $tweet_bd->texto = $tweet->text;
            $tweet_bd->fecha = date('Y-m-d H:i:s', strtotime($tweet->created_at));
            $tweet_bd->tw_id_usuario = $tweet->user->id_str;
            $tweet_bd->tw_nombre_usuario = $tweet->user->name;
            $tweet_bd->tw_usuario = $tweet->user->screen_name;
            $tweet_bd->tweet_ano = 1;
            $tweet_bd->save();
        }
        return $tweet_bd->id;
    }

    public function actualizarVoto($categoria_id, $twitero_id, $tweet_id){
        $tweet_bd = Tweet::find($this->id);
        $tweet_bd->categoria_id = $categoria_id;
        if($twitero_id != NULL)
            $tweet_bd->twitero_id = $twitero_id;
        if($tweet_id != NULL)
            $tweet_bd->tweet_id = $tweet_id;
        $tweet_bd->voto_repetido = Tweet::votoRepetido($categoria_id, $tweet_bd->tw_id_usuario);
        $tweet_bd->save();
    }

    public function categoria(){
        return $this->belongsTo('Categoria');
    }

    public function voto(){
        return $this->belongsTo('Twitero', 'twitero_id');
    }

    public function tweetAno(){
        return $this->belongsTo('Tweet', 'tweet_id');
    }

    public function mostrarCategoria(){
        if($this->categoria_id)
            return $this->categoria->nombre;
        else
            return '---';
    }

    public function mostrarVoto(){
        if($this->twitero_id)
            return '@' . $this->voto->usuario;
        else
            return '---';
    }

    static function reiniciarVotosRepetido(){
        DB::table('tweets')->update(array('voto_repetido' => 0));
    }

    static function votoRepetido($categoria_id, $tw_id_usuario){        
        if($categoria_id != NULL)
            $yaVoto = Tweet::where('categoria_id', $categoria_id)->where('tw_id_usuario', $tw_id_usuario)->whereNotNull('twitero_id')->where('voto_repetido', 0)->count();
        else
            $yaVoto = FALSE;

        if($yaVoto > 1)
            return 1;
        else
            return 0;
    }

    public function contarVotos(){
        return Tweet::where('categoria_id', $this->categoria_id)->where('twitero_id', $this->twitero_id)->where('voto_repetido', 0)->count();
    }

    public function contarVotosAno(){
        return Tweet::where('categoria_id', $this->categoria_id)->where('tweet_id', $this->tweet_id)->where('voto_repetido', 0)->count();
    }

}