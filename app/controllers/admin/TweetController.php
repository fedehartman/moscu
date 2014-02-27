<?php

class TweetController extends BaseController {

    public function getListado(){
        $data['tweets'] = Tweet::orderBy('fecha', 'desc')->get();
        return View::make('admin.tweet.listado', $data);
    }

}