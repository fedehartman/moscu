<div class="row">
  <div class="col-sm-12">
    <div class="box">
      <div class="row">   
        <div class="col-sm-4">
          <div class="box-content box-statistic">
            <h3 class="title text-success">{{ $tweets }}</h3>
            <small><a href="https://twitter.com/{{ $usuario }}" target="_blank">tweets</a></small>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="box-content box-statistic">
            <h3 class="title text-warning">{{ $siguiendo }}</h3>
            <small><a href="https://twitter.com/{{ $usuario }}/following" target="_blank">siguiendo</a></small>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="box-content box-statistic">
            <h3 class="title text-info">{{ $seguidores }}</h3>
            <small><a href="https://twitter.com/{{ $usuario }}/followers" target="_blank">seguidores</a></small>
          </div>
        </div>        
      </div>
    </div>
  </div>
</div>