@extends('admin.layout')

@section('styles')
<link href="{{ URL::to('/css/admin/plugins/datatables/bootstrap-datatable.css') }}" media="all" rel="stylesheet" type="text/css" />
@parent
@stop

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-shopping-cart"></i>
    <span>Listado de Pedidos</span>
  </h1>
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
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Tel&eacute;fono</th>
                <th>Direcci&oacute;n</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($pedidos as $pedido)
              <tr id="pedido_{{ $pedido->id }}">
                <td>{{{ date('d-m-Y H:i:s', strtotime($pedido->created_at)) }}}</td>
                <td>{{{ $pedido->nombre }}}</td>
                <td>{{{ $pedido->email }}}</td>
                <td>{{{ $pedido->telefono }}}</td>
                <td>{{{ $pedido->direccion }}}</td>
                <td>
                  <div class="text-right">
                    <a class="btn btn-primary btn-xs ver" href="#" data-id="{{ $pedido->id }}" data-modelo="pedido" alt="Ver Pedido" title="Ver Pedido">
                      <i class="icon-search"></i>
                    </a>
                    <a class="btn btn-danger btn-xs borrar" href="#" data-id="{{ $pedido->id }}" data-modelo="pedido" alt="Borrar Pedido" title="Borrar Pedido">
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