@extends('admin.layout')

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-twitter"></i>
    <span>Listado de Tweets</span>
  </h1>
  <div class="pull-right">
    <a class="btn btn-success" href="{{ URL::to('/admin/procesar-votos/') }}">Procesar Tweets</a>
  </div>
</div>

@include('admin.partials.mensajes')

<div class="row">
  <div class="col-sm-12">
    <div class="box">
      <div class="box-content">
        <div class="scrollable-area">
          <div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-9"></div>
            <div class="col-lg-3 text-right">
              <select class="form-control" name="categoria" id="categoria">
                <option value="">Todas las categor&iacute;as</option>
                <option value="null" {{ ($categoria == 'null') ? 'selected' : '' }}>Sin categor&iacute;as</option>
                @foreach(Categoria::all() as $cat)
                <option value="{{ $cat->id }}" {{ ($cat->id == $categoria) ? 'selected' : '' }}>{{ $cat->nombre }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
              	<th>Fecha</th>
                <th>Tweet</th>
                <th>Categor&iacute;a</th>
                <th>Twitero</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tweets as $tweet)
              <tr id="tweet_{{ $tweet->id }}">
              	<td>{{{ date('d-m-Y H:i:s', strtotime($tweet->fecha)) }}}</td>
                <td>
                	<a class="btn btn-info btn-xs datos-usuario" href="#" data-usuario="{{ $tweet->tw_id_usuario }}" data-nombre_usuario="{{ $tweet->tw_usuario }}">{{{ $tweet->tw_nombre_usuario }}} - @{{{ $tweet->tw_usuario }}}</a> - <span class="label label-default">{{ $tweet->via }}</span><br/>
                  {{{ $tweet->texto }}}
                </td>
                <td>{{{ $tweet->mostrarCategoria() }}}</td>
                <td>{{{ $tweet->mostrarVoto() }}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10 text-right">{{$paginado}}</div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('script')
@parent
<script type="text/javascript">
$(document).ready(function() {
  $('#categoria').on('change',function(){
    window.location = '/admin/tweet/listado?categoria=' + $('#categoria').val();
  });
});
</script>
@stop