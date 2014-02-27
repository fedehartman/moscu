<!DOCTYPE html>
<html>
  <head>
    <title>Premios Catatonias - Administrador</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <link href='{{URL::to("/ico/favicon.ico")}}' rel='shortcut icon' type='image/x-icon'>
    <link href='{{URL::to("/img/admin/meta_icons/apple-touch-icon.png")}}' rel='apple-touch-icon-precomposed'>
    <link href='{{URL::to("/img/admin/meta_icons/apple-touch-icon-57x57.png")}}' rel='apple-touch-icon-precomposed' sizes='57x57'>
    <link href='{{URL::to("/img/admin/meta_icons/apple-touch-icon-72x72.png")}}' rel='apple-touch-icon-precomposed' sizes='72x72'>
    <link href='{{URL::to("/img/admin/meta_icons/apple-touch-icon-114x114.png")}}' rel='apple-touch-icon-precomposed' sizes='114x114'>
    <link href='{{URL::to("/img/admin/meta_icons/apple-touch-icon-144x144.png")}}' rel='apple-touch-icon-precomposed' sizes='144x144'>
    <!-- / bootstrap [required] -->
    <link href="{{URL::to('/css/admin/bootstrap/bootstrap.css')}}" media="all" rel="stylesheet" type="text/css" />
    <!-- / theme file [required] -->
    <link href="{{URL::to('/css/admin/dark-theme.css')}}" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
    <!-- / coloring file [optional] (if you are going to use custom contrast color) -->
    <link href="{{URL::to('/css/admin/theme-colors.css')}}" media="all" rel="stylesheet" type="text/css" />
    
    <link href="{{URL::to('/css/admin/custom.css')}}" media="all" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
      <script src="{{URL::to('/js/admin/ie/html5shiv.js')}}" type="text/javascript"></script>
      <script src="{{URL::to('/js/admin/ie/respond.min.js')}}" type="text/javascript"></script>
    <![endif]-->
  </head>
  <body class='contrast-blue login contrast-background'>
    <div class='middle-container'>
      <div class='middle-row'>
        <div class='middle-wrapper'>
          <div class='login-container-header'>
            <div class='container'>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='text-center'>
                    <img width="266" height="90" src="{{ URL::asset('/img/admin/logo_lg.svg') }}" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class='login-container'>
            <div class='container'>
              <div class='row'>
                <div class='col-sm-4 col-sm-offset-4'>
                  <h1 class='text-center title'>Ingreso</h1>
                  <form action="{{ URL::to('login') }}" method="post" class="validate-form">
                    @if (Session::has('login_errors'))
                    <div class="alert alert-danger">
                      Email y/o contrase&ntilde;a incorrectos
                    </div>
                    @endif
                    <div class='form-group'>
                      <div class='controls with-icon-over-input'>
                        <input placeholder="Usuario" class="form-control" data-rule-required="true" name="usuario" type="text" />
                        <i class='icon-user text-muted'></i>
                      </div>
                    </div>
                    <div class='form-group'>
                      <div class='controls with-icon-over-input'>
                        <input placeholder="Clave" class="form-control" data-rule-required="true" name="clave" type="password" />
                        <i class='icon-lock text-muted'></i>
                      </div>
                    </div>
                    <div class='checkbox'>
                      <label for='remember'>
                        <input id='remember' name='remember' type='checkbox' value='1'>
                        Recordarme en esta computadora
                      </label>
                    </div>
                    <button class='btn btn-block login'>Ingresar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class='login-container-footer'>
            <div class='container'>
              <div class='row'>
                <div class='col-sm-12'>
                  <div class='text-center'>
                    <a href="{{ Request::root() }}">premioscatatonias.uy</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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
    <script src="{{URL::to('/js/admin/plugins/validate/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/admin/plugins/validate/additional-methods.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/admin/plugins/validate/validate_messages_es.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#form-clave').on('submit',doCambiarClave);
      });

      $('#modal-clave').on('show.bs.modal', function () {
        $("#form-clave .form-group").show();
        $("#form-clave .alert-modal").hide();
      })

      function doCambiarClave(e){
        $(".alert-modal").hide();
        $("#form-clave fieldset").toggle();
        e.preventDefault();
        if(!$("#form-clave").validate().form()) {                    
            return false;
        }else {
          var params = $('#form-clave').serialize();
          $.ajax({
            type: "post",
            url: BASE_PATH + '/recuperar-clave',
            dataType: "json",
            data: params,
            success: function(data) {
              if(!data.error){
                $("#form-clave .form-group").toggle();
                $("#form-clave .alert-success").show(); 
              }else{
                $("#form-clave .alert-danger").show();             
              }
            }
          });
        }
      }
    </script>
  </body>
</html>
