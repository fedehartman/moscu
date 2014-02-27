<div class="scrollable-area">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Tweet</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tweets as $tweet)
      <tr>
        <td>{{{ date('d-m-Y H:i:s', strtotime($tweet->fecha)) }}}</td>
        <td>
          <span class="label label-info">{{{ $tweet->tw_nombre_usuario }}} - @{{{ $tweet->tw_usuario }}}</span><br/>
          {{{ $tweet->texto }}}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>