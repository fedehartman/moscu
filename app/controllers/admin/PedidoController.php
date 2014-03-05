<?php

class PedidoController extends BaseController {

    public function getListado(){
        $data['pedidos'] = Pedido::orderBy('created_at', 'desc')->get();
        return View::make('admin.pedido.listado', $data);
    }

    public function getVer($id) {
        $data['pedido'] = Pedido::find($id);        
        return View::make('admin.pedido.ver', $data);
    }

    public function getBorrar($id) {
        try {
            $pedido = Pedido::find($id);
            $pedido->delete();
        } catch (Exception $e) {
            Log::error($e);
            return $e->getMessage();
        }        
    }

}