<?php

class TweetController extends BaseController {

    public function getListado(){    
    	$categoria = Input::get('categoria', '');

        $tweets = Tweet::where('tweet_ano', 0)->where('procesado', 1);
        if($categoria)
        	$tweets = $tweets->where('categoria_id', $categoria);

        $data['tweets'] = $tweets->orderBy('fecha', 'desc')->paginate(25);
        $data['paginado'] = $data['tweets']->appends(array('categoria' => $categoria))->links();
        $data['categoria'] = $categoria;
        return View::make('admin.tweet.listado', $data);
    }

}