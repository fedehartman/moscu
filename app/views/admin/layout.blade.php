<!DOCTYPE html>
<html>
  <head>
    <title>Premios Catatonias - Administrador</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <link href='{{ URL::to("/ico/favicon.ico")}}' rel='shortcut icon' type='image/x-icon'>
    <link href='{{ URL::to("/img/admin/meta_icons/apple-touch-icon.png")}}' rel='apple-touch-icon-precomposed'>
    <link href='{{ URL::to("/img/admin/meta_icons/apple-touch-icon-57x57.png") }}' rel='apple-touch-icon-precomposed' sizes='57x57'>
    <link href='{{ URL::to("/img/admin/meta_icons/apple-touch-icon-72x72.png") }}' rel='apple-touch-icon-precomposed' sizes='72x72'>
    <link href='{{ URL::to("/img/admin/meta_icons/apple-touch-icon-114x114.png") }}' rel='apple-touch-icon-precomposed' sizes='114x114'>
    <link href='{{ URL::to("/img/admin/meta_icons/apple-touch-icon-144x144.png") }}' rel='apple-touch-icon-precomposed' sizes='144x144'>
    
    @section('styles')
    <!-- / bootstrap [required] -->
    <link href="{{ URL::to('/css/admin/bootstrap/bootstrap.css') }}" media="all" rel="stylesheet" type="text/css" />
    <!-- / theme file [required] -->
    <link href="{{ URL::to('/css/admin/light-theme.css') }}" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
    <!-- / coloring file [optional] (if you are going to use custom contrast color) -->
    <link href="{{ URL::to('/css/admin/theme-colors.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('/css/admin/custom.css') }}" media="all" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
      <script src="{{ URL::to('/js/admin/ie/html5shiv.js') }}" type="text/javascript"></script>
      <script src="{{ URL::to('/js/admin/ie/respond.min.js') }}" type="text/javascript"></script>
    <![endif]-->
    @show

    <script type="text/javascript">
      var BASE_PATH = "{{Request::root()}}";
    </script>

  </head>
  <body class='contrast-blue main-nav-closed'>
    <header>
      <nav class='navbar navbar-default'>
        <a class='navbar-brand' href="{{ URL::to('/admin/dashboard') }}">
          <img width="81" height="21" class="logo" alt="montecable.com" title="montecable.com" src="{{URL::asset('/img/admin/logo.svg')}}" />
          <img width="21" height="21" class="logo-xs" alt="montecable.com" title="montecable.com" src="{{URL::asset('/img/admin/logo_xs.svg')}}" />
        </a>
        <a class="toggle-nav btn pull-left" href="#">
          <i class="icon-reorder"></i>
        </a>
        <ul class='nav'>
          <li class='dropdown dark user-menu'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
              <span class='user-name'>{{{ Auth::user()->nombre }}}</span>
              <b class='caret'></b>
            </a>
            <ul class='dropdown-menu'>
              <li>
                <a href="#modal-clave" role="button" data-toggle="modal">
                  <i class='icon-user'></i> Modificar Clave
                </a>
              </li>
              <li class='divider'></li>
              <li>
                <a href="{{ URL::to('logout') }}">
                  <i class='icon-signout'></i> Salir</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <div id='wrapper'>
      <div id='main-nav-bg'></div>
      <nav id='main-nav'>
        <div class='navigation'>
          <ul class='nav nav-stacked'>
            <li class="{{ Request::is('admin/dashboard*') ? 'active' : '' }}">
              <a href="{{ URL::to('/admin/dashboard') }}">
                <i class='icon-dashboard'></i>
                <span>Escritorio</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/usuario*') ? 'active' : '' }}">
              <a href="{{ URL::to('/admin/usuario/listado') }}">
                <i class='icon-user'></i>
                <span>Usuarios</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/categoria*') ? 'active' : '' }}">
              <a href="{{ URL::to('/admin/categoria/listado') }}">
                <i class='icon-cogs'></i>
                <span>Categor&iacute;as</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/producto*') ? 'active' : '' }}">
              <a href="{{ URL::to('/admin/producto/listado') }}">
                <i class='icon-tags'></i>
                <span>Productos</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/pedido*') ? 'active' : '' }}">
              <a href="{{ URL::to('/admin/pedido/listado') }}">
                <i class='icon-shopping-cart'></i>
                <span>Pedidos</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/twitero*') ? 'active' : '' }}">
              <a href="{{ URL::to('/admin/twitero/listado') }}">
                <i class='icon-group'></i>
                <span>Twiteros</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/tweet*') ? 'active' : '' }}">
              <a href="{{ URL::to('/admin/tweet/listado') }}">
                <i class='icon-twitter'></i>
                <span>Tweets</span>
              </a>
            </li>
            <li class="{{ Request::is('admin/votos') ? 'active' : '' }}">
              <a href="{{ URL::to('/admin/votos') }}">
                <i class='icon-bullhorn'></i>
                <span>Votos</span>
              </a>
            </li>             
          </ul>
        </div>
      </nav>
      <section id='content'>
        <div class='container'>

          <div class='row' id='content-wrapper'>
            <div class='col-xs-12'>
              @yield('content')
            </div>
          </div>

          <footer id="footer">
            <div class="footer-wrapper">
              <div class="row">
                <div class="col-sm-6 text">
                  Copyright © <a href="{{Request::root()}}" target="_blank" >premioscatatonias.uy</a>
                </div>
              </div>
            </div>
          </footer>

				</div>        
      </section>
    </div>

    <!-- modal cambiar clave -->
    <div class="modal fade" id="modal-clave" tabindex="-1" role="dialog" aria-labelledby="ModalCambiarPassword" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Modificiar clave</h4>
          </div>
          <div class="modal-body">
            <form class="form validate-form" method="post" action="{{URL::to('admin/cambiar-clave')}}" id="form-clave">
              <div class="alert alert-danger alert-modal">Ingresó mal su clave anterior</div>
              <div class="alert alert-success alert-modal">Su clave fue cambiada.</div>
              <div class="form-group">
                <label class='control-label' for="clave_vieja">Clave Vieja</label>
                <div class='controls'>
                  <input class="form-control" id="clave_vieja" name="clave_vieja" placeholder="Clave Vieja" type="password" data-rule-required="true">
                </div>
              </div>
              <div class="form-group">
                <label class='control-label' for="clave_vieja">Nueva clave</label>
                <div class='controls'>
                  <input class="form-control" id="nueva_clave" name="nueva_clave" data-rule-password="true" placeholder="Nueva clave" type="password" data-rule-required="true">
                </div>
              </div>
              <div class="form-group">
                <label class='control-label' for="clave_vieja">Repetir Clave</label>
                <div class='controls'>
                  <input class="form-control" data-rule-equalto="#nueva_clave" id="re_clave" name="re_clave" placeholder="Repetir clave" type="password" data-rule-required="true">
                </div>
              </div>
              <button type="submit" class="btn btn-primary span12">Cambiar</button>
              <button type="button" href="#" class="btn span12" data-dismiss="modal" aria-hidden="true">Cerrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- modal ver -->
    <div class="modal fade" id="modal-ver" tabindex="-1" role="dialog" aria-labelledby="ModalVer" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body"></div>
        </div>
      </div>
    </div>

    @section('script')
    <!-- / jquery [required] -->
    <script src="{{URL::to('/js/admin/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <!-- / jquery mobile (for touch events) -->
    <script src="{{URL::to('/js/admin/jquery/jquery.mobile.custom.min.js')}}" type="text/javascript"></script>
    <!-- / jquery migrate (for compatibility with new jquery) [required] -->
    <script src="{{URL::to('/js/admin/jquery/jquery-migrate.min.js')}}" type="text/javascript"></script>
    <!-- / jquery ui -->
    <script src="{{URL::to('/js/admin/jquery/jquery-ui.min.js')}}" type="text/javascript"></script>
    <!-- / jQuery UI Touch Punch -->
    <script src="{{URL::to('/js/admin/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js')}}" type="text/javascript"></script>
    <!-- / bootstrap [required] -->
    <script src="{{URL::to('/js/admin/bootstrap/bootstrap.js')}}" type="text/javascript"></script>
    <!-- / modernizr -->
    <script src="{{URL::to('/js/admin/plugins/modernizr/modernizr.min.js')}}" type="text/javascript"></script>
    <!-- / retina -->
    <script src="{{URL::to('/js/admin/plugins/retina/retina.js')}}" type="text/javascript"></script>
    <!-- / theme file [required] -->
    <script src="{{URL::to('/js/admin/theme.js')}}" type="text/javascript"></script>
    <!-- / START - page related files and scripts [optional] -->
    <script src="{{URL::to('/js/admin/jquery/jquery.form.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/admin/plugins/bootbox/bootbox.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/admin/plugins/validate/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/admin/plugins/validate/additional-methods.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/admin/plugins/validate/validate_messages_es.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/admin/main.js')}}" type="text/javascript"></script>
    @show 

  </body>
</html>