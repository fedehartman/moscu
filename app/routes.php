<?php
/* -----------------------------------------------------------------------------------------------------------------*/
/* ---------------------- RUTAS ADMIN ------------------------------------------------------------------------------*/
/* -----------------------------------------------------------------------------------------------------------------*/
Route::when('admin*', 'auth_admin');

Route::get('/admin', function() {
    return Redirect::to('admin/dashboard');
} );

Route::get('/admin/dashboard', function() {
	$data['tweets'] = Tweet::orderBy('fecha', 'desc')->where('tweet_ano', 0)->where('procesado', 0)->get();
    return View::make('admin.dashboard', $data);
} );

Route::get('login', function() {
    return View::make('admin.login');
} );

Route::post('login', function() {
    $remember = (Input::get('remember',false)) ? true : false; 

    $userdata = array(
        'usuario' => Input::get('usuario'),
        'password' => Input::get('clave')
    );

    if (Auth::attempt($userdata, $remember)) {
        return Redirect::intended('admin/dashboard');
    } else {
        return Redirect::to('login')->with('login_errors', true );
    }
} );

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('login');
} );

Route::get('admin/no-permitido', function() {
    return View::make('admin.no_permitido');
} );

Route::post('admin/cambiar-clave', function() {
    $userdata = array(
        'usuario' => Auth::user()->usuario,
        'password' => Input::get('clave_vieja')
    );

    if (Auth::attempt($userdata)) {
        $usuario = Usuario::where('usuario', Auth::user()->usuario)->first();
        $usuario->clave = Hash::make(Input::get('nueva_clave'));
        $usuario->save();

        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true));
    }     
} );

Route::get('admin/votos', function() {
	// $tweets = Tweet::orderBy('fecha', 'desc')->get();
 //    Tweet::reiniciarVotosRepetido();
 //    foreach ($tweets as $tweet) {
	// 	$categoria_id = Categoria::votoEnLaCategoriaBD($tweet);
	// 	$tweet->actualizarVoto($categoria_id);
	// }

    $data['categorias'] = Categoria::orderBy('orden')->get();
    return View::make('admin.votos', $data);
} );

Route::get('admin/procesar-votos', function() {
    $tweets = Tweet::where('tweet_ano', 0)->where('procesado', '0')->orderBy('fecha', 'desc')->get();
    // Tweet::reiniciarVotosRepetido();
    foreach ($tweets as $tweet) {
		$categoria_id = Categoria::votoEnLaCategoriaBD($tweet);
		if(Categoria::esTweetDelAno($categoria_id)){
			$cat_ano = Twitero::votoAlTwiteroDelTweet($tweet->tw_id);
			$twitero_id = $cat_ano['twitero_id'];
			$tweet_id = $cat_ano['tweet_id'];
		}else{
			$twitero_id = NULL;
			$tweet_id = NULL;
		}		
		$tweet->actualizarVoto($categoria_id, $twitero_id, $tweet_id);
	}

    return Redirect::to('admin/votos')->with('msg_ok', true)->with('msg', 'Se procesaron ' . count($tweets) . ' votos.');
} );

Route::get('admin/ver-votos/{categoria_id}/{twitero_id}', function($categoria_id, $twitero_id) {
    $data['tweets'] = Tweet::where('categoria_id', $categoria_id)->where('twitero_id', $twitero_id)->where('voto_repetido', 0)->get();
    return View::make('admin.ver_votos', $data);
} );

Route::get('admin/ver-votos-ano/{categoria_id}/{tweet_id}', function($categoria_id, $tweet_id) {
    $data['tweets'] = Tweet::where('categoria_id', $categoria_id)->where('tweet_id', $tweet_id)->where('voto_repetido', 0)->get();
    return View::make('admin.ver_votos', $data);
} );

Route::controller('admin/usuario','UsuarioController');
Route::controller('admin/categoria','CategoriaController');
Route::controller('admin/twitero','TwiteroController');
Route::controller('admin/tweet','TweetController');
Route::controller('admin/producto','ProductoController');
Route::controller('admin/pedido','PedidoController');

/* -----------------------------------------------------------------------------------------------------------------*/
/* ---------------------- RUTAS FRONT ------------------------------------------------------------------------------*/
/* -----------------------------------------------------------------------------------------------------------------*/
Route::get('/landing', function()
{
	return View::make('front.landing');
});

Route::get('/', function()
{
    $data['categorias'] = Categoria::where('created_at', '<' , '2014-02-28')->orderBy('orden')->get();
    return View::make('front.beta_index', $data);
});

Route::get('/pagina', function()
{
	$data['productos'] = Producto::all();
    $data['categorias'] = Categoria::where('created_at', '<' , '2014-02-28')->orderBy('orden')->get();
	return View::make('front.index', $data);
});

Route::post('/enviar-pedido', function()
{
    try {
        $pedido = new Pedido;
        $pedido->nombre = Input::get('nombre');
        $pedido->email = Input::get('email');
        $pedido->direccion = Input::get('direccion');
        $pedido->telefono = Input::get('telefono');
        $pedido->comentario = Input::get('comentario');
        $pedido->save();

        foreach (Input::get('producto') as $prod_id => $cantidad) {
            $renglon = new PedidoRenglon;
            $renglon->pedido_id = $pedido->id;
            $renglon->producto_id = $prod_id;
            $renglon->cantidad = $cantidad;
            $renglon->save();
        }

        return $pedido->toJson();
    } catch (Exception $e) {
        Log::error($e);
        die( $e->getMessage() );
    }
});

// Route::get('twitter', function()
// {
// 	/* If access tokens are not available redirect to connect page. */
// 	if (!Session::has('access_token') || !Session::has('access_token.oauth_token') || !Session::has('access_token.oauth_token_secret')) {
// 	    return Redirect::to('logout-twitter');
// 	}

// 	/* Get user access tokens out of the session. */
// 	$access_token = Session::get('access_token');

// 	/* Create a TwitterOauth object with consumer/user tokens. */
// 	$connection = new TwitterOAuth(Config::get('twitter.CONSUMER_KEY'), Config::get('twitter.CONSUMER_SECRET'), $access_token['oauth_token'], $access_token['oauth_token_secret']);

// 	/* If method is set change API call made. Test is called by default. */
// 	$content = $connection->get('account/verify_credentials');

// 	print_r($content);
// 	echo '<br/><a href="logout-twitter">Borrar sesion</a>';
// });

// Route::get('logout-twitter', function() {
//     Session::forget('access_token');
//     return Redirect::to('conectar-twitter');
// } );

// Route::get('conectar-twitter', function() {
//     echo '<a href="redirect-twitter"><img src="/img/lighter.png" alt="Sign in with Twitter"/></a>';
// } );

// Route::get('redirect-twitter', function() {
//     /* Build TwitterOAuth object with client credentials. */
// 	$connection = new TwitterOAuth(Config::get('twitter.CONSUMER_KEY'), Config::get('twitter.CONSUMER_SECRET'));
	 
// 	/* Get temporary credentials. */
// 	$request_token = $connection->getRequestToken(Config::get('twitter.OAUTH_CALLBACK'));

// 	/* Save temporary credentials to session. */
// 	Session::put('oauth_token', $request_token['oauth_token']);
// 	Session::put('oauth_token_secret', $request_token['oauth_token_secret']);
	 
// 	/* If last connection failed don't display authorization link. */
// 	switch ($connection->http_code) {
// 		case 200:
// 			/* Build authorize URL and redirect user to Twitter. */
// 			$url = $connection->getAuthorizeURL($request_token['oauth_token']);
// 			return Redirect::to(htmlspecialchars_decode( $url ));
// 		break;
// 		default:
// 			/* Show notification if something went wrong. */
// 			echo 'Could not connect to Twitter. Refresh the page or try again later.';
// 	}
// } );

// Route::get('callback-twitter', function() {
//     /* If the oauth_token is old redirect to the connect page. */
// 	if (isset($_REQUEST['oauth_token']) && Session::get('oauth_token') !== $_REQUEST['oauth_token']) {
// 		Session::put('oauth_status', 'oldtoken');
// 		return Redirect::to('logout-twitter');
// 	}

// 	/* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
// 	$connection = new TwitterOAuth(Config::get('twitter.CONSUMER_KEY'), Config::get('twitter.CONSUMER_SECRET'), Session::get('oauth_token'), Session::get('oauth_token_secret'));

// 	/* Request access tokens from twitter */
// 	$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

// 	/* Save the access tokens. Normally these would be saved in a database for future use. */
// 	Session::put('access_token', $access_token);

// 	/* Remove no longer needed request tokens */
// 	Session::forget('oauth_token');
// 	Session::forget('oauth_token_secret');

// 	/* If HTTP response is 200 continue otherwise send to connect page to retry */
// 	if (200 == $connection->http_code) {
// 		/* The user has been verified and the access tokens can be saved for future use */
// 		Session::put('status', 'verified');
// 		return Redirect::to('twitter');
// 	} else {
// 		/* Save HTTP status for error dialog on connnect page.*/
// 		return Redirect::to('logout-twitter');
// 	}
// } );

// Route::get('votar-twitter', function() {
//     /* If access tokens are not available redirect to connect page. */
// 	if (!Session::has('access_token') || !Session::has('access_token.oauth_token') || !Session::has('access_token.oauth_token_secret')) {
// 	    return Redirect::to('logout-twitter');
// 	}

// 	/* Get user access tokens out of the session. */
// 	$access_token = Session::get('access_token');

// 	/* Create a TwitterOauth object with consumer/user tokens. */
// 	$connection = new TwitterOAuth(Config::get('twitter.CONSUMER_KEY'), Config::get('twitter.CONSUMER_SECRET'), $access_token['oauth_token'], $access_token['oauth_token_secret']);

// 	// publicar tweet
// 	$parameters = array('status' => 'Twitter 1.1 en laravel 4 #PruebaLaravel4yTwitter con @andres_botta');
// 	$voto = $connection->post('statuses/update', $parameters);
	
// 	print_r($voto);die();
// } );

Route::get('procesar-nuevos-votos', function() {
	$connection = new TwitterOAuth(Config::get('twitter.CONSUMER_KEY'), Config::get('twitter.CONSUMER_SECRET'));

	$parameters = array('q' => '#PremiosCatatonias+exclude:retweets', 'count' => '100', 'result_type' => 'recent');
	if(Configuracion::loadConfiguracion('since_id'))
		$parameters['since_id'] = Configuracion::loadConfiguracion('since_id');

	$votos = $connection->get('search/tweets', $parameters);

	if(count($votos->statuses) > 0){
		$tweet_cargados = array();
		$c = 0;
		foreach (array_reverse($votos->statuses) as $tweet) {
			$c++;
			$categoria_id = Categoria::votoEnLaCategoria($tweet);
			if(Categoria::esTweetDelAno($categoria_id)){
				$cat_ano = Twitero::votoAlTwiteroDelTweet($tweet->id_str);
				$twitero_id = $cat_ano['twitero_id'];
				$tweet_id = $cat_ano['tweet_id'];
			}else{
				$twitero_id = Twitero::votoAlTwitero($tweet);
				$tweet_id = NULL;
			}
			Tweet::guardarVoto($tweet, $categoria_id, $twitero_id, $tweet_id);
			if($c == count($votos->statuses)){
				Configuracion::saveConfiguracion('max_id', $tweet->id_str);
				Configuracion::saveConfiguracion('since_id', $tweet->id_str);	
			}			

	        $text_mail = '<p><b>twitero:</b> @' . $tweet->user->screen_name . '<br/>';
			$text_mail .= '<b>id:</b> ' . $tweet->id_str . '<br/>';
			$text_mail .= '<b>texto:</b> ' . $tweet->text . '<br/>';
			$text_mail .= '<b>fecha:</b> ' . $tweet->created_at . '</p><hr/>';

			$tweet_cargados[] = $text_mail;
		}

		$contenido  = '<p><b>Se encontraron:</b> ' . count($votos->statuses) . ' nuevos tweets</p>';

		$email_data['titulo']    = 'Se ejecuto el cron de nuevos tweets';
		$email_data['texto'] = $contenido;
		$email_data['tweets'] = $tweet_cargados;

		Mail::send('emails.base', $email_data, function($message) use ($email_data){
	        $message->from('info@premioscatatonias.com.uy', 'Premios Catatonias');
	        $message->to('andresbotta@gmail.com')->subject($email_data['titulo']);
	    });
	}
} );

Route::get('procesar-viejos-votos', function() {
	$connection = new TwitterOAuth(Config::get('twitter.CONSUMER_KEY'), Config::get('twitter.CONSUMER_SECRET'));

	$parameters = array('q' => '#PremiosCatatonias+exclude:retweets', 'count' => '100');
	if(Configuracion::loadConfiguracion('max_id'))
		$parameters['max_id'] = Configuracion::loadConfiguracion('max_id');

	$votos = $connection->get('search/tweets', $parameters);

	$c = 0;
	foreach (array_reverse($votos->statuses) as $tweet) {
		$c++;
		$categoria_id = Categoria::votoEnLaCategoria($tweet);
		if(Categoria::esTweetDelAno($categoria_id)){
			$cat_ano = Twitero::votoAlTwiteroDelTweet($tweet->id_str);
			$twitero_id = $cat_ano['twitero_id'];
			$tweet_id = $cat_ano['tweet_id'];
		}else{
			$twitero_id = Twitero::votoAlTwitero($tweet);
			$tweet_id = NULL;
		}
		Tweet::guardarVoto($tweet, $categoria_id, $twitero_id, $tweet_id);
		if($c == count($votos->statuses)){
			Configuracion::saveConfiguracion('max_id', $tweet->id_str);	
		}
	}
	
	print_r(count($votos->statuses));die();
} );

// //LOG CONSULTAS A LA BASE DE DATOS
// DB::listen(function($sql, $bindings, $time)
// {
//     $message = date('d/m/Y H:i:s') . PHP_EOL;
//     foreach ($bindings as $key => $value) {
//         $sql = preg_replace('/\?/', $value, $sql, 1);
//     }
//     $message .= $sql . PHP_EOL;
//     $message .= '---------------------------------------------------------------------------------------------' . PHP_EOL;

//     File::append(storage_path().'/database/queries.log', $message);
// });