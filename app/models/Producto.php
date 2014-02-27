<?php

class Producto extends Eloquent {

	protected $softDelete = true;
	
	protected $table = 'productos';

    public static $categorias = array(
        'autoadhesivos' => 'Autoadhesivos',
        'cuadernolas' => 'Cuadernolas',
        'lapices' => 'Lápices',
        'pins' => 'Pins',
        'remeras' => 'Remeras',
        'tazas' => 'Tazas',
        'combos' => 'Combos'
    );

    public function borrarImagenVieja() {
        if ($this->imagen) {
            if(file_exists(public_path() . '/uploads/producto/' . $this->imagen)){
                unlink(public_path() . '/uploads/producto/' . $this->imagen);
            }
        }
    }

    public function mostrarImagen() {
        if ($this->imagen) {
        	return '<a data-lightbox="flatty" href="' . URL::asset('uploads/producto/' . $this->imagen) . '">
						<img class="img-responsive" src="' . URL::asset('uploads/producto/' . $this->imagen) . '" id="preview" width="230" height="230"/>
					</a>';
        }else{
        	return '<img class="img-responsive" src="http://placehold.it/230x230&amp;text=Imagen" id="preview_imagen" width="230" height="230"/>';
        }
    }

}