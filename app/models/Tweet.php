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
            $tweet_bd->procesado = 0;
            $tweet_bd->via = $tweet->source;
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
            $tweet_bd->procesado = 0;
            $tweet_bd->via = $tweet->source;
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
            $tweet_bd->procesado = 1;
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
        $tweet_bd->procesado = 1;
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

    public function mostrarEstado(){
        if($this->voto_repetido == 0){
            if($this->twitero_id == null)
                return '<span class="label label-warning has-tooltip" data-placement="top" data-original-title="El tweet no sigue la estructura para validarlo">Voto inválido</span>';
            else
                return '<span class="label label-success">Voto válido</span>';
        }elseif($this->voto_repetido == 1)
            return '<span class="label label-important has-tooltip" data-placement="top" data-original-title="El usuario ya voto en la categoría">Voto inválido</span>';
    }

    static function reiniciarVotosRepetido(){
        DB::table('tweets')->update(array('voto_repetido' => 0));
    }

    static function votoRepetido($categoria_id, $tw_id_usuario){
        $yaVoto = false;    
        if($categoria_id != NULL){
            $voto = Tweet::where('categoria_id', $categoria_id)->where('tw_id_usuario', $tw_id_usuario)->whereNotNull('twitero_id')->where('voto_repetido', 0)->where('procesado', 1)->count();
            if($voto)
                $yaVoto = true;
        }

        if($yaVoto)
            return 1;
        else
            return 0;
    }

    public function contarVotos(){
        return Tweet::where('categoria_id', $this->categoria_id)->where('twitero_id', $this->twitero_id)->where('voto_repetido', 0)->where('procesado', 1)->count();
    }

    public function contarVotosAno(){
        return Tweet::where('categoria_id', $this->categoria_id)->where('tweet_id', $this->tweet_id)->where('voto_repetido', 0)->where('procesado', 1)->count();
    }

    static function totalVotos(){
        return Tweet::whereNotNull('categoria_id')->whereNotNull('twitero_id')->where('voto_repetido', 0)->where('procesado', 1)->count();
    }

    static function totalTweets(){
        return Tweet::where('tweet_ano', 0)->count();
    }

    static function totalTweetsSinProcesar(){
        return Tweet::where('tweet_ano', 0)->where('procesado', 0)->count();
    }
    
}