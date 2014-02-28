<?php

class TweetController extends BaseController {

    public function getListado(){
        $data['tweets'] = Tweet::where('tweet_ano', 0)->orderBy('fecha', 'desc')->get();
        return View::make('admin.tweet.listado', $data);
    }

}