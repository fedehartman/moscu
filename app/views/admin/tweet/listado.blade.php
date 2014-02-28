@extends('admin.layout')

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-twitter"></i>
    <span>Listado de Tweets</span>
  </h1>
</div>

@include('admin.partials.mensajes')

<div class="row">
  <div class="col-sm-12">
    <div class="box">
      <div class="box-content">
        <div class="scrollable-area">
          <div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-8"></div>
            <div class="col-sm-4 col-lg-4 text-right">
              <div class="input-group">
                <input class="form-control input-buscar" type="text" placeholder="Buscar" value="{{$buscar}}">
                <div class="input-group-btn">
                  <a class="btn buscar" href="#">Buscar</a>
                </div>
              </div>
            </div>
          </div>
          <table class="table table-bordered table-striped">
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