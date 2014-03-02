@extends('admin.layout')

@section('styles')
<link href="{{ URL::to('/css/admin/plugins/datatables/bootstrap-datatable.css') }}" media="all" rel="stylesheet" type="text/css" />
@parent
@stop

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-cogs"></i>
    <span>Listado de Categor&iacute;as</span>
  </h1>
  <div class="pull-right">
    <a class="btn btn-success hidden-xs" href="{{ URL::to('/admin/categoria/agregar/') }}">Nueva Categor&iacute;a</a>
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
                <th>Orden</th>
                <th>Nombre</th>
                <th>Sponsor</th>
                <th>Palabras Claves</th>
                <th>Fecha</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($categorias as $categoria)
              <tr id="categoria_{{ $categoria->id }}">
                <td>{{{ $categoria->orden }}}</td>
                <td>{{{ $categoria->nombre }}}</td>
                <td>{{{ $categoria->mostrarSponsor() }}}</td>
                <td>{{{ $categoria->palabras_claves }}}</td>
                <td>{{{ date('d/m/Y', strtotime($categoria->created_at)) }}}</td>
                <td>
                  <div class="text-right">
	                  <div class="btn-group">
	                    <a class="btn btn-link btn-xs" href="{{ URL::to('/admin/categoria/participantes/'. $categoria->id) }}">
	                      @if(Categoria::esTweetDelAno($categoria->id)) {{ count($categoria->tweetsAno()) }}
	                      @else {{ count($categoria->participantes()) }}
	                      @endif
	                      <i class="icon-group"></i>
	                    </a>
	                    <a class="btn btn-warning btn-xs" href="{{ URL::to('/admin/categoria/tweets/'. $categoria->id) }}" alt="Tweets de la Categor&iacute;a" title="Tweets de la Categor&iacute;a">
	                      <i class="icon-twitter"></i>
	                    </a>
                    </div>
                    <div class="btn-group">
	                    <a class="btn btn-success btn-xs" href="{{ URL::to('/admin/categoria/editar/'. $categoria->id) }}" alt="Editar Categor&iacute;a" title="Editar Categor&iacute;a">
	                      <i class="icon-pencil"></i>
	                    </a>
	                    <a class="btn btn-danger btn-xs borrar" href="#" data-id="{{ $categoria->id }}" data-modelo="categoria" alt="Borrar Categor&iacute;a" title="Borrar Categor&iacute;a">
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