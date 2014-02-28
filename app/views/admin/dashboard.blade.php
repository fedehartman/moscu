@extends('admin.layout')

@section('content')	  
<div class='page-header'>
  <h1 class='pull-left'>
    <i class='icon-dashboard'></i>
    <span>Escritorio</span>
  </h1>
</div>
<div class='row'>
  <div class='col-sm-12'>
    <div class='row recent-activity'>
      <div class='col-sm-12'>
        <div class='box'>
          <div class='box-header'>
            <div class='title'>
              <i class='icon-refresh'></i>
              Ultimos tweets de #PremiosCatatonias
            </div>
            <div class='actions'>
            </div>
          </div>
          <div class='box-content box-no-padding'>
            <ul class='list-unstyled users list-hover list-striped'>
              @foreach($tweets as $tweet)
              <li>
                <div class='action pull-left'>
                  <a class="text-contrast" href="#">{{{ $tweet->tw_nombre_usuario }}} - @{{{ $tweet->tw_usuario }}}</a>
                  <br/>{{{ $tweet->texto }}}
                </div>
                <small class='date pull-right text-muted'>
                  <span>{{{ date('d-m-Y H:i:s', strtotime($tweet->fecha)) }}}</span> <i class='icon-time'></i>
                </small>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop