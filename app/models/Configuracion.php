<?php

class Configuracion extends Eloquent {

    protected $table = 'configuraciones';

    static function loadConfiguracion($config){
    	$configuracion = Configuracion::where('opcion', $config)->first();
    	return $configuracion->valor;
    }

    static function saveConfiguracion($config, $valor){
    	$configuracion = Configuracion::where('opcion', $config)->first();
  		$configuracion->valor = $valor;
        $configuracion->save();
    }

}