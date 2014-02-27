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