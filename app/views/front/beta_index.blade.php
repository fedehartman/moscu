<!--
Site Name: Premios Catatonias 2014
Idea & Copy: Les Mots | http://lesmots.uy/ — hola@lesmots.uy — @LesMotsUY
Designed and Developed by: Sovieticode — http:/sovietico.de — @sovieticode

Idea, Project Manager & Copy: ..................... Stephanie Biscomb — sbiscomb@gmail.com     — @catatonias — LesMots
Art Direction, Design, HTML/CSS Code & some JS: ... Fede Hartman      — fede@fedehartman.com   — @fedee      — Sovieticode
Chief Programmer Back-End, Front-End & Server: .... Andrés Botta      — andresbotta@gmail.com                — Sovieticode

Full Credits: http://www.premioscatatonias.com.uy/humans.txt
Date: Feb - Mar | 2014
--> 

<!doctype html>

<html lang="es-UY">

<head>
  <title>Premios Catatonias 2014</title>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="Votá a twitteros, ganá premios sorpresa, denuncianos por terrajas, vestite lindo y andá el 15 de marzo a la más mejor gala del mundo y el universo.">
  <meta name="author" content="Sovieticode" />
  <meta name="robots" content="all" /> 

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('/img/front/apple-touch-icon-144x144-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('/img/front/apple-touch-icon-114x114-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('/img/front/apple-touch-icon-72x72-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('/img/front/apple-touch-icon-57x57-precomposed.png') }}">
  <link rel="shortcut icon" href="{{ URL::asset('/img/front/apple-touch-icon.png') }}">
  <link rel="shortcut icon" href="{{ URL::asset('/img/front/favicon.ico') }}" />

  <link rel="stylesheet" href="{{ URL::to('/css/front/style.css') }}">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="{{ URL::to('/js/front/main.js') }}"></script>
  <script src="{{ URL::to('/js/front/plugins.js') }}"></script>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  <script type="text/javascript">
    var BASE_PATH = "{{Request::root()}}";
  </script>

  <meta property="og:title" content="Premios Catatonias 2014" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="http://premioscatatonias.com.uy" />
  <meta property="og:image" content="http://premioscatatonias.com.uy/img/logoprlanding/omo.png" />
  <meta property="og:site_name" content="Premios Catatonias 2014" />
  <meta property="og:description" content="Votá a twitteros, ganá premios sorpresa, denuncianos por terrajas, vestite lindo y andá el 15 de marzo a la más mejor gala del mundo y el universo." />
</head>

<body>




<!--| Analytics
=========================================================================== |-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-36135240-1', 'premioscatatonias.uy');
  ga('send', 'pageview');
</script>





<!--| Facebook Stuff
=========================================================================== |-->

<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<figure class="none"><img src="{{ URL::asset('/img/front/logopromo.png') }}" width="750px" height="550px"></figure>





<!--| Modal
=========================================================================== |-->

<div class="modal none">
  <div class="modalbody">
    <div class="close" onclick="cerrarModal();"></div>
    <p>Mensaje</p>
  </div>
</div>




<!--| Menú
=========================================================================== |-->

<header class="main-header">
  <ul>
    <li class="b00">Inicio</li>
    <li class="b01">Votación</li>
    <!-- <li class="b02">Los Premios</li>
    <li class="b03">La Gala</li>
    <li class="b04">Tienda</li> -->
    <li class="b04">Tienda</li>
  </ul>
</header>





<!--| 1· Home
=========================================================================== |-->

<div class="a00 home"><div class="wrapper">
  <h1><span class="none">Premios Catatonias</span></h1>
  <div class="line line01"></div>
  <h2>Los Premios Catatonias al Patético Mundo <br>del Twitter Uruguasho
  llegaron a su 3ra edición. <br><strong>Sábado 15 de Marzo, 20:30hrs.</strong>
  <br><a href="https://www.google.es/maps/ms?msid=210811873514161027997.0004f3bf0567e6e6f30e7&msa=0&ll=-34.907983,-56.166101&spn=0.015784,0.033023" target="_blank">
  Prato 2333 esq. Cassinoni.</a></h2>
  <div class="gif"></div>
  <div class="line line02"></div>
  <div class="line line03"></div>
  <nav>
    <ul>
      <li class="b01"><a href="#">Votá acá</a></li>
      <li><a href="{{ URL::to('/attach/PremiosCatatonias2014-Brief.pdf') }}">&iquest;Quer&eacute;s saber de qu&eacute; se trata?</a></li>
      <li><a href="{{ URL::to('/attach/PremiosCatatonias2014-PropuestaComercial.pdf') }}">&iquest;Quer&eacute;s participar como marca?</a></li>
      <li class="b02 none"><a href="#">Todo sobre la Gala</a></li>
      <li class="b03 none"><a href="#">Participá como marca</a></li>
      <li class="b04"><a href="#">Do’ pesito’ pa’l vino</a></li>
      <li class="b05 none"><a href="#">¿Qué es esto? ¿Se puede romper?</a></li>
    </ul>
  </nav>
  <div class="social">
    <div class="tw">
      <a href="https://twitter.com/share" class="twitter-share-button" data-text="¿Viste que el 15 de marzo son los #PremiosCatatonias? KENERVIO: " data-lang="es" data-count="none" data-hashtags="PremiosCatatonias">Twittear</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </div>
    <div class="fb">
      <div class="fb-like" data-href="http://premioscatatonias.uy" data-width="120" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
    </div>
  </div>
  <div class="line line04"></div>
  <div class="widget">
    <a class="twitter-timeline" href="https://twitter.com/search?q=%23PremiosCatatonias" data-widget-id="433411683554308096">Tweets sobre "#PremiosCatatonias"</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>
  <div class="creditos">
    <div class="les"><a href="http://lesmots.uy" target="_blank"><span class="none">Les Mots</span></a></div>
    <div class="sov"><a href="http://sovietico.de" target="_blank"><span class="none">Sovieticode</span></a></div>
</div>
</div></div>





<!--| 1· Votación
=========================================================================== |-->

<div class="a01 votacion"><div class="wrapper nano"><div class="nano-content">

  <!--| Header
  ===================================== |-->

  <header class="cabezal">
    <h3>Votación</h3>
    <a href="#" class="prev"></a><a href="#" class="next"></a>
    <article class="slider">
      <div class="slide">
        <h4>Cómo votar y afines</h4>
        <p>Antes que nada: tenés hasta el viernes 14 de marzo a las 23:59 para
        votar. Los ganadores serán anunciados en la <a href="#" class="b03">
        ceremonia de entrega de premios</a> que se realizará el sábado 15 de 
        marzo a partir de las 20:30 horas en un local coqueto que alquilamos en 
        Prato 2333 esq. Cassinoni.</p>
        <p>Dale a la flechita <i></i> y te seguimos contando.</p>
      </div>
      <div class="slide">
        <h4>¿Cómo voto?</h4> 
        <p>Votar es fácil. Vas a la categoría donde querés votar y hacés click en 
        “Votá”. Ahí se te abre una ventanita para que twitteés tu voto. Ingresá el 
        nombre del usuario de a quien votás en vez de [PONER USUARIO] y twitteá. 
        Ya votaste. Sos capo.</p>
        <p><strong>IMPORTANTE:</strong> No cambies mucho el texto del tweet porque 
        si no, seguramente se nos pierda y no podamos contar el voto. Lo más 
        importante es que incluya el hashtag #PremiosCatatonias y no difiera mucho 
        de lo que ya pusimos en el texto pre-determinado.</p>
      </div>
      <div class="slide">
        <h4>¿A quién voto?</h4>
        <p>A cualquiera. Posta. No hay etapa de nominación, no hay opciones y podés 
        votar a todos los que quieras y que pienses se merecen el premio. Podés 
        votar a más de un usuario por premio, las veces que quieras. Podés 
        auto-votarte. Eso sí, solamente podés votar al mismo usuario una vez por 
        premio: los votos se cuentan una sola vez. Incluso podés votar al ganador 
        del año pasado si realmente pensás que no hay nadie más que pueda llevar 
        el título. Nosotros no te vamos a juzgar (al menos no en público).</p>
      </div>
      <div class="slide">
        <h4>Ya voté. ¿Ahora qué?</h4>
        <p>Van a haber dos instancias de votación. Luego de las primeras categorías,
        vamos a estar sumando algunas más en semana de Carnaval. Es posible que se 
        cuelen más categorías después; esas, si existen, saldrán a último momento. 
        A medida que avance la votación, vamos a ir anunciando quiénes van primeros 
        en cada categoría.</p>
      </div>
      <div class="slide">
        <h4>La votación cierra el viernes 14 de marzo a las 23:59</h4>
        <p>(Excepto la de ‘Un argentino, un amigo’ que, por razones de fuerza mayor, 
        tiene que cerrarse el viernes 7 de marzo a las 23:59).
        Durante la última semana de votación, vamos a ir anunciando a los 3 
        finalistas en cada categoría y si hay cambios, para hacernos los 
        interesantes y generar expectativa. Finalmente, <a href="#" class="b03">el
        15 de marzo vamos a anunciar quiénes son los ganadores en La Gala</a>.
        Y si esto es mucha información y te embola leer, seguí a 
        @<a href="http://twitter.com/catatonias" target="_blank">catatonias</a> 
        que entre huecada y huecada va largando algo.</p>
      </div>
     </article>
  </header>


  <!--| Categorias
  ===================================== |-->
  <ul class="categorias">
    @foreach ($categorias as $categoria)
    <li>
      <div class="cabezal">
        <figure class="cat"><img src="{{{ URL::asset('uploads/categoria/' . $categoria->imagen) }}}" width="65" height="65"></figure>
        <h5>{{{ $categoria->nombre }}}</h5>
      </div>
      <p>{{ $categoria->descripcion }}</p>
      @if($categoria->sponsor_imagen)
      <figure class="sponsor"><img src="{{{ URL::asset('uploads/categoria/' . $categoria->sponsor_imagen) }}}" width="235" height="70"></figure>
      @endif
      <div class="vota">
        <a href="#" onclick="popup('http://twitter.com/share?text={{{ urlencode($categoria->boton_votar) }}}&amp;url=', 550, 320)">
          Votá
        </a>
      </div>
    </li>
    @endforeach
  </ul>


</div></div></div>





<!--| 2· Premios
=========================================================================== |-->

<div class="a02 premios none"><div class="wrapper nano"><div class="nano-content">
premios
</div></div></div>





<!--| 3· Gala
=========================================================================== |-->

<div class="a03 gala none"><div class="wrapper nano"><div class="nano-content">
gala
</div></div></div>





<!--| 4· Tienda
=========================================================================== |-->
<div class="a04 tienda"><div class="wrapper nano"><div class="nano-content">

  <!--| Header
  ===================================== |-->
  <header class="cabezal">
    <h3>Donaciones</h3>
    <a href="#" class="prev"></a><a href="#" class="next"></a>
    <article class="slider">
      <div class="slide">
        <p>Este año mucha gente nos preguntó cómo nos podían dar una mano 
        económica para asegurarse que los #PremiosCatatonias se hagan y se sigan 
        haciendo. Si bien algunos propusieron vender nuestros cuerpos a cambio 
        de dinero, creímos que lo mejor era otorgar la oportunidad de donar una 
        módica suma de dinero a cambio de productos súper novedosos (?).</p>
        <p>Dale a la flechita <i></i> y te seguimos contando.</p>
      </div>
      <div class="slide">
        <h4>Por eso creamos esta sección del sitio. Cómo funciona es muy simple: </h4> 
        <p>Mirá qué podés recibir a cambio de donar equis suma de dinero a la causa.</p>
        <p>Elegí el monto de donación que quieras realizar.</p>
        <p>Hacé click en “Donar”.</p>
        <p>Ingresá tu información que irá al Equipo de Logística Súper 
        Confidencial de #PremiosCatatonias (<a href="http://twitter.com/balefin" target="_blank">@Balefin</a>).</p>
      </div>
      <div class="slide">
        <p>Esperá a que juntemos todas las donaciones para un día de la 
        semana y las pasamos a buscar por donde te quede mejor. </p>
        <p>Al donar, tu user de Twitter pasa a ser un “sponsor” y comparte 
        espacio con todos los demás. Cuánto mayor sea la suma de la donación, 
        más prioritario el espacio que se ocupa.</p> 
        <p>A los primeros seis que donen a la causa de los #PremiosCatatonias 
        les regalamos un hermoso escobillón para wáter, gentileza de <a href="http://www.mispetates.com" target="_blank">Mis Petates</a>, 
        con la imagen de un pajarito cagando estampado en el frente. De nada</p>
      </div>
     </article>
  </header>

  <!--| Listado
  ===================================== |-->
  <section class="listado">
    <ul>
      @foreach ($productos as $producto)
      <li>
        <div class="top"></div>
        <div class="line"></div>
        <div class="etiqueta">
          <figure><img src="{{ URL::asset('/uploads/producto/' . $producto->imagen) }}" width="335" height="150"></a></figure>
          <h4>{{{ $producto->nombre }}}</h4>
          <article>
            {{ $producto->descripcion }}
          </article>
          <div class="boton"><a href="#donar" onclick="donar({{{ $producto->id }}});">Doná ${{{ $producto->precio }}}</a></div>
        </div>
      </li>
      @endforeach
    </ul>
  </section>

  <!--| Checkout
  ===================================== |-->
  <section class="checkout" id="donar">
    <h5>¡Gracias por tu donación! Sos lo más.<br>
    Para poder pasarla a buscar y
    darte tus regalos, necesitamos la siguiente información: </h5>
    <form id="form-pedido">
      <div class="form-column">
        <input type="text" placeholder="Nombre y apellido" name="nombre" id="nombre" required />
        <input type="text" placeholder="Usuario de Twitter" name="twitter" id="twitter" required />
        <input type="email" placeholder="Email" name="email" id="email" required />
        <input type="text" placeholder="Dirección" name="direccion" id="direccion" required />
        <input type="tel" placeholder="Teléfono" name="telefono" id="telefono" required />
      </div>
      <div class="form-column">
        <textarea placeholder="Decinos cuánto querés donar y algún comentario ahí que te salga" name="comentario" id="comentario"></textarea>
        <input type="hidden" name="producto" id="producto" />
        <input type="submit" class="submit" value="Enviar" />
      </div>
    </form>
  </section>

</div></div></div>


<div class="tapar none"></div>



<!--| Fotter
=========================================================================== |-->

<footer>
    <div class="footer1">
      <div class="slider1">
        <div class="logos">
          <div class="logo lesmots"><a target="_blank" href="http:/lesmots.uy"></a></div>
          <div class="logo subrayado"><a target="_blank" href="http://www.subrayado.com.uy/"></a></div>
          <div class="logo sovieticode"><a target="_blank" href="http://twitter.com/sovieticode"></a></div>
          <div class="logo vito"><a target="_blank" href="http://twitter.com/vito_magarulo"></a></div>
          <div class="logo makeit"><a target="_blank" href="http://makeitwork.com.uy/"></a></div>
          <div class="logo cativelli"><a target="_blank" href="http://www.cattivelli.com/"></a></div>
        </div>
        <div class="logos">
          <div class="logo living"><a target="_blank" href="https://www.facebook.com/tuliving"></a></div>
          <div class="logo casitanno"><a target="_blank" href="http://www.facebook.com/pages/Casitanno-restobar/171005276275918"></a></div>
          <div class="logo fernet"><a target="_blank" href="http://www.fernetbranca.com/"></a></div>
          <div class="logo miller"><a target="_blank" href="http://twitter.com/Miller_Uruguay"></a></div>
          <div class="logo natalia"><a target="_blank" href="http://www.nataliasastre.com/"></a></div>
          <div class="logo boton"><a target="_blank" href="http://boton.tv/index.php?region=uy"></a></div>
        </div>
        <div class="logos">
          <div class="logo tweet"><a target="_blank" href="http://www.tweet-tag.com/es/"></a></div>
          <div class="logo blog"><a target="_blank" href="http://blogcouture.info/"></a></div>
          <div class="logo ataque"><a target="_blank" href="http://www.atacaesquimal.com/"></a></div>
          <div class="logo justicia"><a target="_blank" href="http://www.oceanofm.com/justicia-infinita/"></a></div>
          <div class="logo candilejas"><a target="_blank" href="http://www.facebook.com/candilejas.resto.7"></a></div>
          <div class="logo petates"><a target="_blank" href="http://www.mispetates.com/"></a></div>
        </div>
        <div class="logos">
          <div class="logo amareto"><a target="_blank" href="http://www.amaretto.com.uy/"></a></div>
          <div class="logo cromo"><a target="_blank" href="http://www.cromo.com.uy/"></a></div>
          <div class="logo punta"><a target="_blank" href="http://www.puntacarretasweb.com.uy/"></a></div>
          <div class="logo tarmac"><a target="_blank" href="http://www.amaretto.com.uy/"></a></div>
        </div>
      </div>
    </div>
  <div class="footer2">
   Excusa para hacer algo lindo de: <a href="http://lesmots.uy" targe="_blank">LesMots</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    Diseño & Desarrollo: <a href="http://twitter.com/sovieticode" targe="_blank">Sovieticode</a> 
  </div>
</footer>



<!--|====================================================================== |-->

</body>
</html>
