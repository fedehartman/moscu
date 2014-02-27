<?php

class TwiteroController extends BaseController {

    public function getListado(){
        $data['twiteros'] = Twitero::orderBy('created_at', 'desc')->get();
        return View::make('admin.twitero.listado', $data);
    }

}