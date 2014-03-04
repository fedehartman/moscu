@extends('admin.layout')

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-user"></i>
    <span>Agregar Usuario</span>
  </h1>
  <div class="pull-right">
    <div class="btn-group">
      <a class="btn" href="{{ URL::to('/admin/usuario/listado/') }}"><i class="icon-circle-arrow-left"></i> Volver al listado</a>
      <a class="btn btn-success" href="{{ URL::to('/admin/usuario/agregar/') }}">Nuevo Usuario</a>
    </div>    
  </div>
</div>

@include('admin.partials.mensajes')

<div class="row">
  <div class="col-sm-12">
    <div class="box">
      <div class="box-header blue-background">
        <div class="title"></div>
        <div class="actions"></div>
      </div>
      <div class="box-content">
        <form class="form form-horizontal validate-form" action="{{ URL::to('admin/usuario/guardar/') }}" method="post">
          <div class="form-group">
            <label class="control-label col-sm-3 col-sm-3" for="nombre">Nombre</label>
            <div class="col-sm-4 controls">
              <input class="form-control" data-rule-required="true" id="nombre" name="nombre" placeholder="Nombre" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="usuario">Usuario</label>
            <div class="col-sm-4 controls">
              <input class="form-control" data-rule-required="true" id="usuario" name="usuario" placeholder="Usuario" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="clave">Clave</label>
            <div class="col-sm-4 controls">
              <input class="form-control" data-rule-password="true" data-rule-required="true" id="clave" name="clave" placeholder="Clave" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="clave_2">Confirmar Clave</label>
            <div class="col-sm-4 controls">
              <input class="form-control" data-rule-equalto="#clave" data-rule-required="true" id="clave_2" name="clave_2" placeholder="Confirmar Clave" type="password">
            </div>
          </div>
          <div class="form-actions">
            <div class="row">
              <div class="col-sm-9 col-sm-offset-3">
                <button class="btn btn-primary" type="submit">
                  <i class="icon-save"></i> Guardar
                </button>
                <a class="btn" href="{{ URL::to('/admin/usuario/listado/') }}">Cancelar</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop