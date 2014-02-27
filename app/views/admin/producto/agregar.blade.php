@extends('admin.layout')

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-tags"></i>
    <span>Agregar Categor&iacute;a</span>
  </h1>
  <div class="pull-right">
    <div class="btn-group">
      <a class="btn hidden-xs" href="{{ URL::to('/admin/producto/listado/') }}"><i class="icon-circle-arrow-left"></i> Volver al listado</a>
      <a class="btn btn-success hidden-xs" href="{{ URL::to('/admin/producto/agregar/') }}">Nueva Categor&iacute;a</a>
    </div>    
  </div>
</div>

@include('admin.partials.mensajes')

<div class="row">
  <form class="form form-horizontal validate-form" action="{{ URL::to('admin/producto/guardar/') }}" method="post" enctype="multipart/form-data">
    <div class="col-sm-3 col-lg-2">
      <div class="box">
        <div class="box-content">
          <img class="img-responsive" src="http://placehold.it/230x230&amp;text=Imagen" id="preview_imagen" width="230" height="230">
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
            <label class="control-label col-sm-3" for="categoria">Categor&iacute;a</label>
            <div class="col-sm-4 controls">
              <select class="form-control" id="categoria" name="categoria">
                @foreach(Producto::$categorias as $key => $t)
                <option value="{{ $key }}">{{ $t }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3 col-sm-3" for="nombre">Nombre</label>
            <div class="col-sm-4 controls">
              <input class="form-control" data-rule-required="true" id="nombre" name="nombre" placeholder="Nombre" type="text">
            </div>
          </div>
          <div class='form-group'>
            <label class="control-label col-sm-3 col-sm-3" for="descripcion">Descripci&oacute;n</label>
            <div class="col-sm-6 controls">
              <textarea class='form-control' data-rule-required="true" name="descripcion" id='descripcion' placeholder='Descripci&oacute;n' rows='3'></textarea>
            </div>
          </div>          
          <div class="form-group">
            <label class="control-label col-sm-3" for="precio">Precio</label>
            <div class="col-sm-3 controls">
              <input class="form-control" data-rule-required="true" data-rule-number="true" id="precio" name="precio" placeholder="Precio" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3"></label>
            <div class="col-sm-6 controls">              
              <input title="<i class='icon-picture'></i> Subir imagen" data-rule-required="true" type="file" accept="image/*" name="imagen" id="imagen">
            </div>
          </div>
          <div class="form-actions">
            <div class="row">
              <div class="col-sm-9 col-sm-offset-3">
                <button class="btn btn-primary" type="submit">
                  <i class="icon-save"></i> Guardar
                </button>
                <a class="btn" href="{{ URL::to('/admin/producto/listado/') }}">Cancelar</a>
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
  });
</script>
@stop