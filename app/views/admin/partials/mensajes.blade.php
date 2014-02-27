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