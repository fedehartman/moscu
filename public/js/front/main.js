$(document).ready(function() {

/*--| Scroller
-------------------------------------------------------------------------- |--*/

$(".nano").nanoScroller();

$(".mobile").click(function(e) {
   $(".mobile-lay").addClass('none');
  return false;
  });

/*--| Cycle Footer
-------------------------------------------------------------------------- |--*/

$('.slider1').cycle({ 
    fx:     'fade', 
    speed:  800, 
    timeout: 4500, 
  });


/*--| Cycle Textos
-------------------------------------------------------------------------- |--*/
$('.slider').cycle({ 
    fx:     'fade', 
    speed:  'fast', 
    timeout: 0, 
    next:   '.next', 
    prev:   '.prev' 
  });





/*--| Tienda
-------------------------------------------------------------------------- |--*/

$('#Grid').mixitup({});

$('#form-pedido').on('submit',enviarPedido);


/*--| Nav
-------------------------------------------------------------------------- |--*/

$(".a00 .contenido").click(function(e) {
  e.preventDefault();
  $('header').delay(450).queue(function(){
    $(this).addClass('hmov');
    $(this).dequeue();
    });
  $('footer').delay(450).queue(function(){
    $(this).addClass('fmov');
    $(this).dequeue();
    });
  $('.a01').addClass('m01');
  $('.a02').removeClass('m02');
  $('.a03').removeClass('m03');
  $('.a04').removeClass('m04');
  return false;
  });

$(".b00").click(function(e) {
  e.preventDefault();
  $('.tapar').addClass('none');
  $('header').removeClass('hmov');
  $('footer').removeClass('fmov');
  $('.a01').removeClass('m01');
  $('.a02').removeClass('m02');
  $('.a03').removeClass('m03');
  $('.a04').removeClass('m04');
  return false;
  });

$(".b01").click(function(e) {
  e.preventDefault();
  $('header').delay(450).queue(function(){
    $(this).addClass('hmov');
    $(this).dequeue();
    });
  $('footer').delay(450).queue(function(){
    $(this).addClass('fmov');
    $(this).dequeue();
    });
  $('.tapar').delay(1200).queue(function(){
    $(this).removeClass('none');
    $(this).dequeue();
    });
  $('.a01').addClass('m01');
  $('.a02').removeClass('m02');
  $('.a03').removeClass('m03');
  $('.a04').removeClass('m04');
  return false;
  });


$(".b02").click(function(e) {
  e.preventDefault();
  $('header').delay(450).queue(function(){
    $(this).addClass('hmov');
    $(this).dequeue();
    });
  $('footer').delay(450).queue(function(){
    $(this).addClass('fmov');
    $(this).dequeue();
    });
  $('.tapar').delay(1200).queue(function(){
    $(this).removeClass('none');
    $(this).dequeue();
    });
  $('.a01').removeClass('m01');
  $('.a02').addClass('m02');
  $('.a03').removeClass('m03');
  $('.a04').removeClass('m04');
  return false;
  });

$(".b03").click(function(e) {
  e.preventDefault();
  $('header').delay(450).queue(function(){
    $(this).addClass('hmov');
    $(this).dequeue();
    });
  $('footer').delay(450).queue(function(){
    $(this).addClass('fmov');
    $(this).dequeue();
    });
  $('.tapar').delay(1200).queue(function(){
    $(this).removeClass('none');
    $(this).dequeue();
    });
  $('.a01').removeClass('m01');
  $('.a02').removeClass('m02');
  $('.a03').addClass('m03');
  $('.a04').removeClass('m04');
  return false;
  });

$(".b04").click(function(e) {
  e.preventDefault();
  $('header').delay(450).queue(function(){
    $(this).addClass('hmov');
    $(this).dequeue();
    });
  $('footer').delay(450).queue(function(){
    $(this).addClass('fmov');
    $(this).dequeue();
    });
  $('.tapar').delay(1200).queue(function(){
    $(this).removeClass('none');
    $(this).dequeue();
    });
  $('.a01').removeClass('m01');
  $('.a02').removeClass('m02');
  $('.a03').removeClass('m03');
  $('.a04').addClass('m04');
  return false;
  });

});

function popup(url, w, h){
  win = window.open(url, '', 'width=' + w + ',height=' + h + ',toolbar=no,menubar=no,scrollbars=yes,resizable=no');
}

/*--| Modal
-------------------------------------------------------------------------- |--*/
function mostrarModal(texto){
  $(".a00, .a01, .a02, .a03, .a04, header, footer").addClass('blur');
  $(".modalbody p").html(texto);
  $(".modal").removeClass('none');
  return false;
}

function cerrarModal(){
  $(".a00, .a01, .a02, .a03, .a04, header, footer").removeClass('blur');
  $(".modalbody p").html('');
  $(".modal").addClass('none');
  return false;
}

/*--| Tienda
-------------------------------------------------------------------------- |--*/
function agregarTienda(producto_id){
  var tipo = $('#' + producto_id).data('type');
  var producto = $('#' + producto_id + ' h4').html();
  var precio = $('#' + producto_id + ' #precio span').html();
  var cantidad = $('#' + producto_id + ' #cantidad').val();
  if($('#tienda_' + producto_id).length == 0) {
    var tr = '<tr id="tienda_' + producto_id + '"><td>' + cantidad + '</td>';
      tr += '<td>' + tipo + '</td>';
      tr += '<td>' + producto + '</td>';
      tr += '<td>$ <span>' + precio * cantidad + '</span></td>';
      tr += '<td class="delete" onclick="borrarTienda(' + producto_id + ')"></td>';
      tr += '<input name="producto[' + producto_id + ']" type="hidden" value="' + cantidad + '" /></tr>';
    $('.checkout table tbody').append(tr);
  }else{
    var cant_vieja = parseInt($('#tienda_' + producto_id + ' td:eq(0)').html());
    var precio_viejo = parseInt($('#tienda_' + producto_id + ' td:eq(3) span').html());
    $('#tienda_' + producto_id + ' td:eq(0)').html(cant_vieja + parseInt(cantidad));
    $('#tienda_' + producto_id + ' td:eq(3) span').html(precio_viejo + (precio * cantidad));
    $('#tienda_' + producto_id + ' input[name="producto[' + producto_id + ']"]').val(cant_vieja + parseInt(cantidad));
  }  
  calcularTotal();
  $("#" + producto_id + " .comprado").removeClass('none');
}

function borrarTienda(producto_id){
  var r = confirm("¿Esta seguro que quiere quitar el producto?");
  if (r == true){
    $('#tienda_' + producto_id).remove();
    $("#" + producto_id + " .comprado").addClass('none');
    calcularTotal();
  }  
}

function calcularTotal(){
  var total = 0;
  $(".checkout table tbody tr").each(function() {
    var nuevo_valor = $(this).children("td:eq(3)").children("span").text();
    total += parseInt(nuevo_valor);   
  }); 
   $('#total span').html(total);
}

function enviarPedido(e){
  e.preventDefault();
  e.stopPropagation();
  if($(".checkout table tbody tr").length == 0){
    alert('No seleccionastes ningun producto.');
  }else{
    var params = $('#form-pedido').serialize();
    $.ajax({
      type: "post",
      url: BASE_PATH + '/enviar-pedido',
      dataType: "json",
      data: params,
      success: function(data){
        $('#nombre').val('');
        $('#email').val('');
        $('#direccion').val('');
        $('#telefono').val('');
        $('#comentario').val('');
        $('.checkout table tbody').html('');
        calcularTotal();
        mostrarModal('Nos pondremos en contacto para hacerle llegar el pedido, gracias.');
      },
      error: function(jqXHR, textStatus, errorThrown){
        alert(jqXHR.responseText);
      }
    });
  }
  
}

