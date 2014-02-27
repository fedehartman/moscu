@extends('admin.layout')

@section('styles')
<link href="{{ URL::to('/css/admin/plugins/datatables/bootstrap-datatable.css') }}" media="all" rel="stylesheet" type="text/css" />
@parent
@stop

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-user"></i>
    <span>Listado de Usuarios</span>
  </h1>
  <div class="pull-right">
    <a class="btn btn-success hidden-xs" href="{{ URL::to('/admin/usuario/agregar/') }}">Nuevo Usuario</a>
  </div>
</div>

@include('admin.partials.mensajes')

<div class="row">
  <div class="col-sm-12">
    <div class="box">
      <div class="box-content">
        <div class="scrollable-area">
          <table class="data-table table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Usuario</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($usuarios as $usuario)
              <tr id="usuario_{{ $usuario->id }}">
                <td>{{{ $usuario->nombre }}}</td>
                <td>{{{ $usuario->usuario }}}</td>
                <td>
                  <div class="text-right">
                    <a class="btn btn-success btn-xs" href="{{ URL::to('/admin/usuario/editar/'. $usuario->id) }}" alt="Editar Usuario" title="Editar Usuario">
                      <i class="icon-pencil"></i>
                    </a>
                    <a class="btn btn-danger btn-xs borrar" href="#" data-id="{{ $usuario->id }}" data-modelo="usuario" alt="Borrar Usuario" title="Borrar Usuario">
                      <i class="icon-remove"></i>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('script')
@parent
<script src="{{ URL::to('/js/admin/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::to('/js/admin/plugins/datatables/jquery.dataTables.columnFilter.js') }}" type="text/javascript"></script>
<script src="{{ URL::to('/js/admin/plugins/datatables/dataTables.overrides.js') }}" type="text/javascript"></script>
@stop