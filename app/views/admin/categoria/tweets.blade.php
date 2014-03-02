@extends('admin.layout')

@section('styles')
<link href="{{ URL::to('/css/admin/plugins/datatables/bootstrap-datatable.css') }}" media="all" rel="stylesheet" type="text/css" />
@parent
@stop

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-cogs"></i>
    <span>Tweets de la categor&iacute;a <b class="text-info">{{{ $categoria->nombre }}}</b></span>
  </h1>
  <div class="pull-right">
    <div class="btn-group">
      <a class="btn hidden-xs" href="{{ URL::to('/admin/categoria/listado/') }}"><i class="icon-circle-arrow-left"></i> Volver al listado</a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="box">
      <div class="box-content">
        <div class="scrollable-area">
          <table class="data-table table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Tweet</th>
                <th>Twitero</th>                
              </tr>
            </thead>
            <tbody>
              @foreach($categoria->tweets as $tweet)
              <tr>
                <td>{{ $tweet->id }}</td>
                <td>{{{ date('d-m-Y H:i:s', strtotime($tweet->fecha)) }}}</td>
                <td>{{ $tweet->mostrarEstado() }}</td>
                <td>
                  <span class="label label-info">{{{ $tweet->tw_nombre_usuario }}} - @{{{ $tweet->tw_usuario }}}</span><br/>
                  {{{ $tweet->texto }}}
                </td>
                <td>{{{ $tweet->mostrarVoto() }}}</td>                
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