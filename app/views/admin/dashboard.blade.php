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
              Actividades recientes de los Clientes
            </div>
            <div class='actions'>
            </div>
          </div>
          <div class='box-content box-no-padding'>
            <ul class='list-unstyled users list-hover list-striped'>
              <li>
                <div class='avatar pull-left'>
                  <div class='icon-user'></div>
                </div>
                <div class='action pull-left'>
                  <a class="text-contrast" href="#">Jean</a>
                  signed in
                </div>
                <small class='date pull-right text-muted'>
                  <span>September 15, 2013 - 17:34</span> <i class='icon-time'></i>
                </small>
              </li>
              <li>
                <div class='avatar pull-left'>
                  <div class='icon-user'></div>
                </div>
                <div class='action pull-left'>
                  <a class="text-contrast" href="#">Jason</a>
                  signed in
                </div>
                <small class='date pull-right text-muted'>
                  <span>September 15, 2013 - 17:34</span> <i class='icon-time'></i>
                </small>
              </li>
              <li>
                <div class='avatar pull-left'>
                  <div class='icon-user'></div>
                </div>
                <div class='action pull-left'>
                  <a class="text-contrast" href="#">Johnnie</a>
                  commented
                </div>
                <small class='date pull-right text-muted'>
                  <span>September 15, 2013 - 17:34</span> <i class='icon-time'></i>
                </small>
              </li>
              <li>
                <div class='avatar pull-left'>
                  <div class='icon-user'></div>
                </div>
                <div class='action pull-left'>
                  <a class="text-contrast" href="#">Alma</a>
                  commented
                </div>
                <small class='date pull-right text-muted'>
                  <span>September 15, 2013 - 17:34</span> <i class='icon-time'></i>
                </small>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop