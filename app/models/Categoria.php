<?php

class Categoria extends Eloquent {

	protected $softDelete = true;
	
	protected $table = 'categorias';

	public static $tipos = array(
		'hashtag' => 'Hashtag',
		'mencion' => 'Usuario'
	);

	public function tweets(){
		return $this->hasMany('Tweet');
	}

	static function votoEnLaCategoria($tweet){
		foreach (Categoria::all() as $categoria) {
			$palabras_claves = explode(';', $categoria->palabras_claves);
			foreach ($palabras_claves as $palabra) {
				$buscar_categoria = strpos(strtolower($tweet->text), strtolower($palabra));
				if($buscar_categoria !== FALSE){
					if($categoria->sponsor){
						if($categoria->sponsor_tipo == 'hashtag'){
							foreach ($tweet->entities->hashtags as $hastag) {
								if(strtolower($categoria->sponsor) == strtolower($hastag->text))
									return $categoria->id;
							}
						}elseif($categoria->sponsor_tipo == 'mencion'){
							foreach ($tweet->entities->user_mentions as $mencion) {
								if(strtolower($categoria->sponsor) == strtolower($mencion->screen_name))
									return $categoria->id;
							}
						}
					}else{
						return $categoria->id;
					}				
				}
			}
		}
		return NULL;
    }

    static function votoEnLaCategoriaBD($tweet){
		foreach (Categoria::all() as $categoria) {
			$palabras_claves = explode(';', $categoria->palabras_claves);
			foreach ($palabras_claves as $palabra) {
				$buscar_categoria = strpos(strtolower($tweet->texto), strtolower($palabra));
				if($buscar_categoria !== FALSE){
					if($categoria->sponsor){
						$buscar_sponsor = strpos(strtolower($tweet->texto), strtolower($categoria->mostrarSponsor()));
						if($buscar_sponsor !== FALSE)
							return $categoria->id;
					}else{
						return $categoria->id;
					}				
				}
			}
		}
		return NULL;
    }

    static function esTweetDelAno($cat_id){
		$cat = Categoria::find($cat_id);
		if($cat){
			if(strtolower($cat->nombre) == 'tweet del año')
				return true;
			else
				return false;
		}else{
			return false;
		}
    }

    static function mencionEsSponsor($mencion){
		$sponsor = Categoria::where('sponsor_tipo', 'mencion')->where('sponsor', $mencion)->first();
		if($sponsor)
			return true;
		else
			return false;
    }

    public function participantes(){
		return $this->tweets()->whereNotNull('twitero_id')->groupBy('twitero_id')->get();
	}

	public function tweetsAno(){
		return $this->tweets()->whereNotNull('tweet_id')->groupBy('tweet_id')->get();
	}	

	public function mostrarSponsor(){
		if($this->sponsor)
        	return ($this->sponsor_tipo == 'hashtag') ? '#' . $this->sponsor : '@' . $this->sponsor;
    	else
    		return '---';
    }

    public function borrarImagenVieja() {
        if ($this->imagen) {
            if(file_exists(public_path() . '/uploads/categoria/' . $this->imagen)){
                unlink(public_path() . '/uploads/categoria/' . $this->imagen);
            }
        }
    }

    public function borrarImagenSponsorVieja() {
        if ($this->sponsor_imagen) {
            if(file_exists(public_path() . '/uploads/categoria/' . $this->sponsor_imagen)){
                unlink(public_path() . '/uploads/categoria/' . $this->sponsor_imagen);
            }
        }
    }

    public function mostrarImagen() {
        if ($this->imagen) {
        	return '<a data-lightbox="flatty" href="' . URL::asset('uploads/categoria/' . $this->imagen) . '">
						<img class="img-responsive" src="' . URL::asset('uploads/categoria/' . $this->imagen) . '" id="preview_imagen" width="230" height="230"/>
					</a>';
        }else{
        	return '<img class="img-responsive" src="http://placehold.it/230x230&amp;text=Imagen" id="preview_imagen" width="230" height="230"/>';
        }
    }

    public function mostrarImagenSponsor() {
        if ($this->sponsor_imagen) {
        	return '<a data-lightbox="flatty" href="' . URL::asset('uploads/categoria/' . $this->sponsor_imagen) . '">
						<img class="img-responsive" src="' . URL::asset('uploads/categoria/' . $this->sponsor_imagen) . '" id="preview_sponsor" width="230" height="230"/>
					</a>';
        }else{
        	return '<img class="img-responsive" src="http://placehold.it/230x230&amp;text=Imagen" id="preview_sponsor" width="230" height="230"/>';
        }
    }

    public function categoriaClass() {
        if ($this->created_at > '2014-02-28') {
        	if($this->boton_votar)
        		return 'class="cat-nueva"';
        	else
        		return 'class="cat-locked"';
        }else{
        	return '';
        }
    }

    public function mejoresTwiteros(){
		$mejores = DB::select("SELECT categoria_id, twitero_id,(SELECT usuario FROM twiteros WHERE twiteros.id = t2.twitero_id) as twitero, (SELECT count(*) FROM `tweets` t WHERE t.`deleted_at` IS NULL AND t.`categoria_id` = " . $this->id . " AND t.`twitero_id` = t2.`twitero_id` AND `voto_repetido` = 0 AND `procesado` = 1) as votos FROM `tweets` t2 WHERE t2.`deleted_at` IS NULL AND t2.`categoria_id` = " . $this->id . " AND t2.`twitero_id` is not null GROUP BY t2.`twitero_id` ORDER BY `votos` DESC LIMIT 3");
		return $mejores;
	}

	public function mejoresTweets(){
		$mejores = DB::select("SELECT t2.categoria_id, t2.tweet_id, ta.tw_nombre_usuario as tw_ano_nombre_usuario, ta.tw_usuario as tw_ano_usuario, ta.texto as tw_ano_texto, (SELECT count(*) FROM `tweets` t WHERE t.`deleted_at` IS NULL AND t.`categoria_id` = " . $this->id . " AND t.`tweet_id` = t2.`tweet_id` AND `voto_repetido` = 0 AND `procesado` = 1) as votos FROM `tweets` t2, `tweets` ta WHERE t2.`deleted_at` IS NULL AND t2.tweet_id = ta.id AND t2.`categoria_id` = " . $this->id . " AND t2.`tweet_id` is not null GROUP BY t2.`tweet_id` ORDER BY `votos` DESC LIMIT 3");
		return $mejores;
	}

}