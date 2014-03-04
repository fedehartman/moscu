@extends('admin.layout')

@section('styles')
<link href="{{URL::to('/css/admin/plugins/lightbox/lightbox.css')}}" media="all" rel="stylesheet" type="text/css" />
@parent
@stop

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-cogs"></i>
    <span>Editar Categor&iacute;a</span>
  </h1>
  <div class="pull-right">
    <div class="btn-group">
      <a class="btn" href="{{ URL::to('/admin/categoria/listado/') }}"><i class="icon-circle-arrow-left"></i> Volver al listado</a>
      <a class="btn btn-success" href="{{ URL::to('/admin/categoria/agregar/') }}">Nuevo Categor&iacute;a</a>
    </div>
  </div>
</div>

@include('admin.partials.mensajes')

<div class="row">
  <form class="form form-horizontal validate-form" action="{{ URL::to('admin/categoria/guardar/') }}" method="post" enctype="multipart/form-data">
    <div class="col-sm-3 col-lg-2">
      <div class="box">
        <div class="box-content">
          {{ $categoria->mostrarImagen() }}
        </div>
      </div>
      <div class="box">
        <div class="box-content">
          {{ $categoria->mostrarImagenSponsor() }}
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-lg-10">
	    <div class="box">
	      <div class="box-header blue-background">
	        <div class="title"></div>
	        <div class="actions"></div>
	      </div>
	      <div class="box-content">
          <div class="form-group">
            <label class="control-label col-sm-3 col-sm-3" for="nombre">Nombre</label>
            <div class="col-sm-4 controls">
              <input class="form-control" data-rule-required="true" id="nombre" name="nombre" placeholder="Nombre" type="text" value="{{{ $categoria->nombre }}}">
            </div>
          </div>
          <div class='form-group'>
            <label class="control-label col-sm-3 col-sm-3" for="descripcion">Descripci&oacute;n</label>
            <div class="col-sm-6 controls">
              <textarea class='form-control' data-rule-required="true" name="descripcion" id='descripcion' placeholder='Descripci&oacute;n' rows='3'>{{{ $categoria->descripcion }}}</textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3"></label>
            <div class="col-sm-6 controls">              
              <input title="<i class='icon-picture'></i> Subir imagen" type="file" accept="image/*" name="imagen" id="imagen">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3 col-sm-3" for="palabras_claves">Palabras Claves</label>
            <div class="col-sm-8 controls">
              <input class="form-control" data-rule-required="true" id="palabras_claves" name="palabras_claves" placeholder="Palabras Claves" type="text" value="{{{ $categoria->palabras_claves }}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="tipo">Tipo de Sponsor</label>
            <div class="col-sm-4 controls">
              <select class="form-control" id="tipo" name="tipo">
                @foreach(Categoria::$tipos as $key => $t)
                <option value="{{ $key }}" {{ ($categoria->sponsor_tipo == $key) ? 'selected' : '' }}>{{ $t }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="sponsor">Sponsor</label>
            <div class="col-sm-4 controls">
              <input class="form-control" id="sponsor" name="sponsor" placeholder="Sponsor" type="text" value="{{{ $categoria->sponsor }}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3"></label>
            <div class="col-sm-6 controls">              
              <input title="<i class='icon-picture'></i> Subir sponsor" type="file" accept="image/*" name="imagen_sponsor" id="imagen_sponsor">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3 col-sm-3" for="boton_votar">Bot&oacute;n de votar</label>
            <div class="col-sm-8 controls">
              <input class="form-control" data-rule-required="true" id="boton_votar" name="boton_votar" placeholder="Bot&oacute;n de votar" type="text" value="{{{ $categoria->boton_votar }}}" maxlength="140">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="orden">Orden</label>
            <div class="col-sm-4 controls">
              <div class="row">
                <div class="col-xs-4">
                  <input class="form-control" data-rule-number="true" id="orden" name="orden" type="text" value="{{{ $categoria->orden }}}">
                </div>
              </div>
            </div>
          </div>
          <div class="form-actions">
            <div class="row">
              <div class="col-sm-9 col-sm-offset-3">
                <button class="btn btn-primary" type="submit">
                  <i class="icon-save"></i> Guardar
                </button>
                <a class="btn" href="{{ URL::to('/admin/categoria/listado/') }}">Cancelar</a>
                <input type="hidden" name="id" value="{{ $categoria->id }}">
              </div>
            </div>
          </div>
      	</div>
    	</div>
  	</div>
  </form>
</div>
@stop

@section('script')
@parent
<script src="{{URL::to('/js/admin/plugins/lightbox/lightbox.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('/js/admin/plugins/fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#imagen').on('change',function(){
      var image = document.getElementById("imagen").files[0];
      oFReader = new FileReader();
      oFReader.readAsDataURL(image);
      document.getElementById("preview_imagen").src = '';
      oFReader.onload = function (oFREvent){
        document.getElementById("preview_imagen").src = oFREvent.target.result;
      }
    });

    $('#imagen_sponsor').on('change',function(){
      var image = document.getElementById("imagen_sponsor").files[0];
      oFReader = new FileReader();
      oFReader.readAsDataURL(image);
      document.getElementById("preview_sponsor").src = '';
      oFReader.onload = function (oFREvent){
        document.getElementById("preview_sponsor").src = oFREvent.target.result;
      }
    });
  });
</script>
@stop