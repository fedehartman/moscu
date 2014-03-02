<?php

class CategoriaController extends BaseController {

    public function getListado(){
        $data['categorias'] = Categoria::orderBy('created_at', 'desc')->get();
        return View::make('admin.categoria.listado', $data);
    }

    public function getAgregar(){
        return View::make('admin.categoria.agregar');
    }

    public function getEditar($id) {
        $data['categoria'] = Categoria::find($id);
        return View::make('admin.categoria.editar', $data);
    }

    public function postGuardar() {
        try {
            if(Input::get('id')){
                $categoria = Categoria::find(Input::get('id'));
            }else{
                $categoria = new Categoria;
            }
            $categoria->nombre = Input::get('nombre');
            $categoria->descripcion = Input::get('descripcion');
            $categoria->palabras_claves = Input::get('palabras_claves');
            $categoria->sponsor_tipo = Input::get('tipo');
            $categoria->sponsor = Input::get('sponsor');
            $categoria->boton_votar = Input::get('boton_votar');
            $categoria->orden = Input::get('orden');

            if (Input::hasFile('imagen')) {
                $file = Input::file('imagen');
                if ($file->getError() != 4) {
                    $ext = pathinfo( $file->getClientOriginalName(), PATHINFO_EXTENSION );
                    $fileName = md5( $file->getClientOriginalName() ).'.'.$ext;
                    if ($file->move(public_path() . '/uploads/categoria/', $fileName)){
                        $categoria->borrarImagenVieja();
                        $categoria->imagen = $fileName;
                    }
                }
            }

            if (Input::hasFile('imagen_sponsor')) {
                $file = Input::file('imagen_sponsor');
                if ($file->getError() != 4) {
                    $ext = pathinfo( $file->getClientOriginalName(), PATHINFO_EXTENSION );
                    $fileName = md5( $file->getClientOriginalName() ).'.'.$ext;
                    if ($file->move(public_path() . '/uploads/categoria/', $fileName)){
                        $categoria->borrarImagenSponsorVieja();
                        $categoria->sponsor_imagen = $fileName;
                    }
                }
            }

            $categoria->save();

            return Redirect::to('admin/categoria/editar/' . $categoria->id)->with('msg_ok', true);
        } catch (Exception $e) {
            Log::error($e);
            return Redirect::to(URL::previous())->with('msg_error', true);
        }  
    }

    public function getBorrar($id) {
        try {
            $categoria = Categoria::find($id);
            $categoria->delete();
        } catch (Exception $e) {
            Log::error($e);
            return $e->getMessage();
        }        
    }

    public function getParticipantes($id) {
        $data['categoria'] = Categoria::find($id);
        return View::make('admin.categoria.participantes', $data);
    }

    public function getTweets($id) {
        $data['categoria'] = Categoria::find($id);
        return View::make('admin.categoria.tweets', $data);
    }

}