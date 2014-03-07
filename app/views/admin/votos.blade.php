@extends('admin.layout')

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-bullhorn"></i>
    <span>Mejores por categor&iacute;a</span>
  </h1>
  <div class="pull-right">
    <a class="btn btn-success" href="{{ URL::to('/admin/procesar-votos/') }}">Procesar Tweets</a>
  </div>
</div>

@include('admin.partials.mensajes')

@foreach($categorias as $categoria)
<div class="row">
  <div class="col-sm-12">
    <div class="box box-collapsed">
      @if(Categoria::esTweetDelAno($categoria->id))
      <div class="box-header fb-background">
        <div class="title">{{{ $categoria->nombre }}}</div>
        <div class="actions">          
          <a class="btn box-collapse btn btn-link" href="#"> <i></i>
          </a>
        </div>
      </div>
      <div class="box-content">
        <div class="scrollable-area">        
          <table class="data-table2 table table-bordered table-striped">
            <thead>
              <tr>
                <th>Tweet</th>
                <th>Votos</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($categoria->mejoresTweets() as $tweet)
              <tr>
                <td>
                  <span class="label label-info">{{{ $tweet->tw_ano_nombre_usuario }}} - @{{{ $tweet->tw_ano_usuario }}}</span><br/>
                  {{{ $tweet->tw_ano_texto }}}
                </td>
                <td>{{ $tweet->votos }}</td>
                <td>
                  <div class="text-right">
                    <a class="btn btn-primary btn-xs ver-votos-ano" href="#" data-categoria="{{ $tweet->categoria_id }}" data-tweet="{{ $tweet->tweet_id }}" alt="Ver Votos" title="Ver Votos">
                      <i class="icon-search"></i>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10 text-right"><a class="btn btn-info" href="{{ URL::to('/admin/categoria/participantes/'. $categoria->id) }}"><i class="icon-group"></i> Ver todos los participantes</a></div>
          </div>                  
        </div>
      </div>
      @else
      <div class="box-header fb-background">
        <div class="title">{{{ $categoria->nombre }}}</div>
        <div class="actions">          
          <a class="btn box-collapse btn btn-link" href="#"><i></i>
          </a>
        </div>
      </div>
      <div class="box-content">
        <div class="scrollable-area">        
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Twitero</th>
                <th>Votos</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($categoria->mejoresTwiteros() as $usuario)
              <tr>
                <td>{{ '@' . $usuario->twitero }}</td>
                <td>{{ $usuario->votos }}</td>
                <td>
                  <div class="text-right">
                    <a class="btn btn-primary btn-xs ver-votos" href="#" data-categoria="{{ $usuario->categoria_id }}" data-twitero="{{ $usuario->twitero_id }}" alt="Ver Votos" title="Ver Votos">
                      <i class="icon-search"></i>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10 text-right"><a class="btn btn-info" href="{{ URL::to('/admin/categoria/participantes/'. $categoria->id) }}"><i class="icon-group"></i> Ver todos los participantes</a></div>
          </div>                 
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
@endforeach
@stop