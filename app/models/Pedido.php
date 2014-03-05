<?php

class Pedido extends Eloquent {

	protected $softDelete = true;
	
	protected $table = 'pedidos';

	public function renglones(){
		return $this->hasMany('PedidoRenglon');
	}

	public function renglonCombo(){
		return $this->hasMany('PedidoRenglon')->first();
	}
	
}