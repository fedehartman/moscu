<?php

class ProductoController extends BaseController {

    public function getListado(){
        $data['productos'] = Producto::orderBy('created_at', 'desc')->get();
        return View::make('admin.producto.listado', $data);
    }

    public function getAgregar(){
        return View::make('admin.producto.agregar');
    }

    public function getEditar($id) {
        $data['producto'] = Producto::find($id);
        return View::make('admin.producto.editar', $data);
    }

    public function postGuardar() {
        try {
            if(Input::get('id')){
                $producto = Producto::find(Input::get('id'));
            }else{
                $producto = new Producto;
            }
            $producto->categoria = Input::get('categoria');
            $producto->nombre = Input::get('nombre');
            $producto->descripcion = Input::get('descripcion');
            $producto->precio = Input::get('precio');

            if (Input::hasFile('imagen')) {
                $file = Input::file('imagen');
                if ($file->getError() != 4) {
                    $ext = pathinfo( $file->getClientOriginalName(), PATHINFO_EXTENSION );
                    $ext = ($ext == 'jpg') ? 'jpeg' : $ext;
                    $fileName = md5( $file->getClientOriginalName() ).'.'.$ext;
                    if ($file->move(public_path() . '/uploads/producto/', $fileName)){
                        $producto->borrarImagenVieja();
                        $producto->imagen = $fileName;
                    }
                }
            }

            $producto->save();

            return Redirect::to('admin/producto/editar/' . $producto->id)->with('msg_ok', true);
        } catch (Exception $e) {
            Log::error($e);
            return Redirect::to(URL::previous())->with('msg_error', true);
        }  
    }

    public function getBorrar($id) {
        try {
            $producto = Producto::find($id);
            $producto->delete();
        } catch (Exception $e) {
            Log::error($e);
            return $e->getMessage();
        }        
    }

}