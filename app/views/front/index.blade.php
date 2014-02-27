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
  <title>Premios Catatonias</title>

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

  <link rel="stylesheet" href="{{ URL::to('/css/front/reset.css') }}">
  <link rel="stylesheet" href="{{ URL::to('/css/front/style.css') }}">
  <link rel="stylesheet" href="{{ URL::to('/css/front/mq.css') }}">
  <link rel="stylesheet" href="{{ URL::to('/css/front/move.css') }}">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="{{ URL::to('/js/front/main.js') }}"></script>
  <script src="{{ URL::to('/js/front/plugins.js') }}"></script>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  <script type="text/javascript">
    var BASE_PATH = "{{Request::root()}}";
  </script>
</head>

<body>



<!--| Analytics
=============================================================================================== |-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-36135240-1', 'premioscatatonias.uy');
  ga('send', 'pageview');

</script>

<div class="mobile"></div>


<!--| Modal
=========================================================================== |-->
<div class="modal none">
  <div class="modalbody">
    <div class="close"></div>
    <p>Mensaje</p>
  </div>
</div>




<!--| Menú
=========================================================================== |-->
<header class="main-header">
  <ul>
    <li class="b00"><span class="none">Inicio</span></li>
    <li class="b01"><span class="none">Votación</span></li>
    <li class="b02"><span class="none">Los Premios</span></li>
    <li class="b03"><span class="none">La Gala</span></li>
    <li class="b04"><span class="none">Tienda</span></li>
    <li class="b05"><span class="none">Contacto</span></li>
  </ul>
</header>



<!--| 1· Home
=========================================================================== |-->
<div class="a00 home"><div class="wrapper nano"><div class="nano-content">
home
</div></div></div>



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
        Prato esq. Cassinoni.</p>
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
<div class="a02 premios"><div class="wrapper nano"><div class="nano-content">
Premio
</div></div></div>

<!--| 3· Gala
=========================================================================== |-->
<div class="a03 gala"><div class="wrapper nano"><div class="nano-content">
Gala
</div></div></div>

<!--| 4· Tienda
=========================================================================== |-->
<div class="a04 tienda"><div class="wrapper nano"><div class="nano-content">


  <!--| Header
  ===================================== |-->
  <header class="cabezal">
    <h3>Tienda</h3>
    <article>
      <p>Este es un tuit que va a tener 140 caracteres y va a servir para medir la
       cantidad de texto que va a entrar en esta parte del diseño acá va. Este es 
       un tuit que va a tener 140 caracteres y va a servir para medir la cantidad 
       de texto que va a entrar en esta parte del diseño acá va. Este es un tuit 
       que va a tener 140 caracteres y va a servir para medir la cantidad de texto 
       que va a entrar en esta parte del diseño acá va. Este es un tuit que va a 
       tener 140 caracteres y va a servir para medir la cantidad de texto que va a 
       entrar en esta parte del diseño acá va.</p>
     </article>
  </header>

  <!--| Menú
  ===================================== |-->
  <nav>
    <ul>
      <li class="filter autoadhesivos" data-filter="autoadhesivos">Autoadhesivos</li>
      <li class="filter cuadernolas" data-filter="cuadernolas">Cuadernolas</li>
      <li class="filter lapices" data-filter="lapices">Lápices</li>
      <li class="filter pins" data-filter="pins">Pins</li>
      <li class="filter remeras" data-filter="remeras">Remeras</li>
      <li class="filter tazas" data-filter="tazas">Tazas</li>
      <li class="filter combos" data-filter="combos">Combos</li>
      <li class="filter active todos" data-filter="all">Todos</li>
    </ul>
  </nav>


  <!--| Listado
  ===================================== |-->
  <section class="listado">
    <ul id="Grid">
      @foreach ($productos as $producto)
      <li class="mix {{{ $producto->categoria }}}" data-type="{{{ $producto->categoria }}}" id="{{ $producto->id }}">
        <div class="comprado none"></div>
        <div class="top"></div>
        <div class="etiqueta">
          <figure>
            <a href="{{ URL::asset('/uploads/producto/' . $producto->imagen) }}" data-lightbox="image-1" title="{{{ $producto->descripcion }}}">
            <img src="{{ URL::asset('/uploads/producto/' . $producto->imagen) }}" width="175" height="175"></a>
          </figure>
          <h4>{{{ $producto->nombre }}}</h4>
          <div class="preciogo">
            <div class="precio" id="precio">$ <span>{{{ $producto->precio }}}</span></div>
            <form class="go">
              <select name="cantidad" id="cantidad">
              @for ($i = 1; $i <= 5; $i++)
                <option>{{ $i }}</option>
              @endfor
              </select>
              <a href="#" class="comprar" onclick="agregarTienda({{ $producto->id }})">Comprar</a>
            </form>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </section>

  <!--| Checkout
  ===================================== |-->
  <form id="form-pedido">
    <section class="checkout">
      <div class="tabla">
        <h5>Hasta ahora vas comprando esto:</h5>
        <table>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <td></td>
              <td></td>
              <td class="total">Total:</td>
              <td class="precio" id="total">$ <span>0</span></td>
              <td></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="form">
        <h5>Ahora tus datos y te lo mandamos</h5>      
        <div class="form-column">
          <input type="text" placeholder="Nombre y apellido" name="nombre" id="nombre" required />
          <input type="email" placeholder="Email" name="email" id="email" required />
          <input type="text" placeholder="Dirección" name="direccion" id="direccion" required />
          <input type="tel" placeholder="Teléfono" name="telefono" id="telefono" required />
        </div>
        <div class="form-column">
          <textarea placeholder="¿Algún comentario?" name="comentario" id="comentario"></textarea>
          <input type="submit" class="submit" value="enviar" /> 
        </div>      
      </div>
    </section>
  </form>

</div></div></div>


<div class="tapar none"></div>



<!--| Fotter
=========================================================================== |-->
<footer>
  <div class="footer1"></div>
  <div class="footer2"></div>
</footer>


<!--|====================================================================== |-->

</body>
</html>
