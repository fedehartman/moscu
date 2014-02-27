<?php

class PedidoRenglon extends Eloquent {

	protected $softDelete = true;
	
	protected $table = 'pedido_renglon';

	public function pedido(){
        return $this->belongsTo('Pedido');
    }

    public function producto(){
        return $this->belongsTo('Producto');
    }

    public function precio(){
		return $this->producto->precio * $this->cantidad;
	}


}