@if (Session::has('msg_info'))
<div class="alert alert-info alert-dismissable">  
  <h4><i class="icon-info-sign"></i> Info</h4>
  {{ Session::get('msg') }}
</div>
@endif

@if (Session::has('msg_error'))
<div class="alert alert-danger alert-dismissable">
  <h4><i class="icon-remove-sign"></i> Error</h4>
  {{ Session::get('msg', 'Ocurrio un error al guardar los cambios.') }}
</div>
@endif

@if (Session::has('msg_ok'))
<div class="alert alert-success alert-dismissable">
  <h4><i class="icon-ok-sign"></i> Exito</h4>
  {{ Session::get('msg', 'Los cambios fueron guardados.') }}
</div>
@endif

<div class="row">
  <div class="col-sm-12">
    <div class="box">
      <div class="row">
        <div class="col-sm-3">
          <div class="box-content box-statistic">
            <h3 class="title text-primary">{{ Tweet::totalTweets() }}</h3>
            <small>tweets</small>
            <div class="text-primary icon-twitter align-right"></div>
          </div>
        </div>        
        <div class="col-sm-3">
          <div class="box-content box-statistic">
            <h3 class="title text-success">{{ Tweet::totalVotos() }}</h3>
            <small>votos válidos</small>
            <div class="text-success icon-star align-right"></div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="box-content box-statistic">
            <h3 class="title text-error">{{ Tweet::totalTweetsSinProcesar() }}</h3>
            <small>tweets sin procesar</small>
            <div class="text-error icon-twitter-sign align-right"></div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="box-content box-statistic">
            <h3 class="title text-info">{{ count(Twitero::all()) }}</h3>
            <small>twiteros</small>
            <div class="text-info icon-group align-right"></div>
          </div>
        </div>        
      </div>
    </div>
  </div>
</div>