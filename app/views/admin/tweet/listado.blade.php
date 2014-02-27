@extends('admin.layout')

@section('styles')
<link href="{{ URL::to('/css/admin/plugins/datatables/bootstrap-datatable.css') }}" media="all" rel="stylesheet" type="text/css" />
@parent
@stop

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-envelope-alt"></i>
    <span>Listado de Tweets</span>
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
                <th>Tweet</th>
                <th>Categor&iacute;a</th>
                <th>Voto a</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tweets as $tweet)
              <tr id="tweet_{{ $tweet->id }}">
              	<td>{{{ date('d-m-Y H:i:s', strtotime($tweet->fecha)) }}}</td>
                <td>
                	<span class="label label-info">{{{ $tweet->tw_nombre_usuario }}} - @{{{ $tweet->tw_usuario }}}</span><br/>
                  {{{ $tweet->texto }}}
                </td>
                <td>{{{ $tweet->mostrarCategoria() }}}</td>
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