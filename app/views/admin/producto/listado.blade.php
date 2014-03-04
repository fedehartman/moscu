@extends('admin.layout')

@section('styles')
<link href="{{ URL::to('/css/admin/plugins/datatables/bootstrap-datatable.css') }}" media="all" rel="stylesheet" type="text/css" />
@parent
@stop

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-tags"></i>
    <span>Listado de Productos</span>
  </h1>
  <div class="pull-right">
    <a class="btn btn-success" href="{{ URL::to('/admin/producto/agregar/') }}">Nuevo Producto</a>
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
                <th>Categor&iacute;a</th>
                <th>Precio</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($productos as $producto)
              <tr id="producto_{{ $producto->id }}">
                <td>{{{ $producto->nombre }}}</td>
                <td>{{ Producto::$categorias[$producto->categoria] }}</td>
                <td>{{{ $producto->precio }}}</td>
                <td>
                  <div class="text-right">
                  	<div class="btn-group">
	                    <a class="btn btn-success btn-xs" href="{{ URL::to('/admin/producto/editar/'. $producto->id) }}" alt="Editar Producto" title="Editar Producto">
	                      <i class="icon-pencil"></i>
	                    </a>
	                    <a class="btn btn-danger btn-xs borrar" href="#" data-id="{{ $producto->id }}" data-modelo="producto" alt="Borrar Producto" title="Borrar Producto">
	                      <i class="icon-remove"></i>
	                    </a>
                   	</div>
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