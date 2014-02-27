<div class="row">
  <div class="col-sm-5">
    <address>
      <strong>Nombre</strong>
      <p>{{{ $pedido->nombre }}}</p>
    </address>
  </div>
  <div class="col-sm-6 col-sm-offset-1">
    <address>
      <strong>Email</strong><br>
      <p>{{{ $pedido->email }}}</p>
    </address>
  </div>
</div>

<div class="row">
  <div class="col-sm-5">
    <address>
      <strong>Tel&eacute;fono</strong><br>
      <p>{{{ $pedido->telefono }}}</p>
    </address>
  </div>
  <div class="col-sm-6 col-sm-offset-1">
    <address>
      <strong>Direcci&oacute;n</strong><br>
      <p>{{{ $pedido->direccion }}}</p>
    </address>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <address>
      <strong>Comentarios</strong><br>
      <p>{{{ $pedido->comentario }}}</p>
    </address>
  </div>
</div>

<div class="scrollable-area">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
      </tr>
    </thead>
    <tbody>
      <?php $total = 0; ?>
      @foreach($pedido->renglones as $renglon)
      <?php $total += $renglon->producto->precio * $renglon->cantidad; ?>
      <tr>
        <td>{{{ $renglon->producto->nombre }}}</td>
        <td>{{{ $renglon->cantidad }}}</td>
        <td>{{{ $renglon->precio() }}}</td>
      </tr>
      @endforeach
      <tr>
        <td></td>
        <td><b>Total:</b></td>
        <td>{{{ $total }}}</td>
      </tr>
    </tbody>
  </table>
</div>