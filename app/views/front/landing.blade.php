<!--
Site Name: Premios Catatonias 2014
Idea & Copy: Les Mots | http://lesmots.uy/ — hola@lesmots.uy — @LesMotsUY
Designed and Developed by: Sovieticode — sovieticode.uy — @sovieticode

Idea, Project Manager & Copy: ..................... Stephanie Biscomb — sbiscomb@gmail.com     — @catatonias — LesMots
Art Direction, Design, HTML/CSS Code & some JS: ... Fede Hartman      — fede@fedehartman.com   — @fedee      — Sovieticode
Chief Programmer Back-End, Front-End & Server: .... Andrés Botta      — andresbotta@gmail.com  — @AndruloB   — Sovieticode

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

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('/img/front/landing/apple-touch-icon-144x144-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('/img/front/landing/apple-touch-icon-114x114-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('/img/front/landing/apple-touch-icon-72x72-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('/img/front/landing/apple-touch-icon-57x57-precomposed.png') }}">
  <link rel="shortcut icon" href="{{ URL::asset('/img/front/landing/apple-touch-icon.png') }}">
  <link rel="shortcut icon" href="{{ URL::asset('/img/front/landing/favicon.ico') }}" />

  <link rel="stylesheet" href="{{ URL::to('/css/front/landing/reset.css') }}">
  <link rel="stylesheet" href="{{ URL::to('/css/front/landing/style.css') }}">
  <link rel="stylesheet" href="{{ URL::to('/css/front/landing/move.css') }}">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="{{ URL::to('/js/front/landing/main.js') }}"></script>
  <script src="{{ URL::to('/js/front/landing/plugins.js') }}"></script>

  <meta property="og:title" content="Premios Catatonias 2014" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="http://premioscatatonias.com.uy" />
  <meta property="og:image" content="http://premioscatatonias.com.uy/img/logoprlanding/omo.png" />
  <meta property="og:site_name" content="Premios Catatonias 2014" />
  <meta property="og:description" content="Votá a twitteros, ganá premios sorpresa, denuncianos por terrajas, vestite lindo y andá el 15 de marzo a la más mejor gala del mundo y el universo." />

</head>

<!--| Analytics
=============================================================================================== |-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-36135240-1', 'premioscatatonias.com');
  ga('send', 'pageview');

</script>

<body>
<figure class="none"><img src="{{ URL::asset('/img/front/landing/logopromo.png') }}" width="750px" height="550px"></figure>

<!--| Facebook Stuff
=============================================================================================== |-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!--| Content
=============================================================================================== |-->
<div class="stage02 mov-stage">
  <div class="content">
    <div class="imago mov-imago"></div>
    <h1 class="mov-logo">Premios Catatonias</h1>
    <h2>Edici&oacute;n 2014</h2>
    <h3 class="mov-fecha">S&aacute;bado 15 de marzo</h3>
    <div class="line01 mov-line01"></div><div class="line02 mov-line02"></div>
    <p class="mov-brief-01">&iquest;Quer&eacute;s saber de qu&eacute; se trata? <a href="{{ URL::to('/attach/PremiosCatatonias2014-Brief.pdf') }}" target="_blank">Baj&aacute; nuestro brief</a></p>
    <p class="last mov-brief-02">&iquest;Quer&eacute;s participar como marca? <a href="{{ URL::to('/attach/PremiosCatatonias2014-PropuestaComercial.pdf') }}" target="_blank">Baj&aacute; nuestra propuesta comercial</a></p>
    <p class="last02 mov-brief-03">&iquest;Quer&eacute;s saber cuándo vas a poder votar? <a href="#">Baj&aacute; las revoluciones acá</a></p>
    <div class="line03 mov-line03"></div>
    <div class="social mov-social">
      <div class="tw"><a href="https://twitter.com/share" class="twitter-share-button" data-text="¿Viste que el 15 de marzo son los #PremiosCatatonias? KENERVIO: " data-lang="es" data-count="none" data-hashtags="PremiosCatatonias">Twittear</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></div>
      <div class="fb"><div class="fb-like" data-href="http://premioscatatonias.com.uy/" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div></div>
    </div>
  </div>
</div>

<div class="stage03 none">
  <div class="content">
    <h4>¿Realmente pensaron que les ibamos a decir? Vayan a laburar</h4>
    <div class="text text01 mov-text01"></div>
    <div class="text text02 mov-text02"></div>
    <div class="text text03 mov-text03"></div>
    <div class="text text04 mov-text04"></div>
    <div class="text text05 mov-text05"></div>
    <div class="text text06 mov-text06"></div>
    <div class="text text07 mov-text07"></div>
    <figure class="mov-gif"></figure>
    <div class="line04 mov-line04"></div>
    <div class="line05 mov-line05"></div>
    <div class="text text08 mov-text08"></div>
    <div class="text text09 mov-text09"></div>
  </div>
</div>



<!--| Footer
=============================================================================================== |-->
<footer class="mov-footer">Excusa para hacer algo lindo de:&nbsp; <a href="http://lesmots.uy/" target="_blank">Les Mots</a>&nbsp;&nbsp;|
  &nbsp;&nbsp;Diseño & Desarrollo:&nbsp; <a href="https://twitter.com/sovieticode" target="_blank">Sovieticode</a></footer>
<!--|========================================================================================== |-->

</body>
</html>
