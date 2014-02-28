<?php

class TweetController extends BaseController {

    public function getListado(){
    	$buscar = Input::get('buscar', '');        
        $data['tweets'] = Tweet::where('tweet_ano', 0)->orderBy('fecha', 'desc')->paginate(25);
        $data['paginado'] = $data['tweets']->appends(array('buscar' => $buscar))->links();
        $data['buscar'] = $buscar;
        return View::make('admin.tweet.listado', $data);
    }

}