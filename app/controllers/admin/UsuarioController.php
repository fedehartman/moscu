<?php

class UsuarioController extends BaseController {

    public function getListado(){
        $data['usuarios'] = Usuario::orderBy('created_at', 'desc')->get();
        return View::make('admin.usuario.listado', $data);
    }

    public function getAgregar(){
        return View::make('admin.usuario.agregar');
    }

    public function getEditar($id) {
        $data['usuario'] = Usuario::find($id);
        return View::make('admin.usuario.editar', $data);
    }

    public function postGuardar() {
        try {
            if(Input::get('id')){
                $usuario = Usuario::find(Input::get('id'));
            }else{
                $usuario = new Usuario;
            }
            $usuario->nombre = Input::get('nombre');
            $usuario->usuario = Input::get('usuario');
            if(Input::get('clave'))
                $usuario->clave = Hash::make(Input::get('clave'));
            $usuario->save();

            return Redirect::to('admin/usuario/editar/' . $usuario->id)->with('msg_ok', true);
        } catch (Exception $e) {
            Log::error($e);
            return Redirect::to(URL::previous())->with('msg_error', true);
        }  
    }

    public function getBorrar($id) {
        try {
            $usuario = Usuario::find($id);
            $usuario->delete();
        } catch (Exception $e) {
            Log::error($e);
            return $e->getMessage();
        }        
    }

}