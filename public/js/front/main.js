$(document).ready(function() {

/*--| Scroller
-------------------------------------------------------------------------- |--*/

$(".nano").nanoScroller();





/*--| Cycle Footer
-------------------------------------------------------------------------- |--*/

$('.slider1').cycle({ 
    fx:     'fade', 
    speed:  800, 
    timeout: 4600, 
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





/*--| Home Gif
-------------------------------------------------------------------------- |--*/

$(".gif").randombg({
    directory: "../img/front/dummys/gif/",
    howmany: 12
  });





/*--| Tienda
-------------------------------------------------------------------------- |--*/

$('#form-pedido').on('submit',enviarPedido);

$(".tienda .listado ul li .boton a").click(function(e) {
  $(".tienda .listado ul li .boton a").removeClass('donado');
  $(this).addClass('donado');
});





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
  $('.tapar').delay(700).queue(function(){
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
  $('.tapar').delay(700).queue(function(){
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
  $('.tapar').delay(700).queue(function(){
    $(this).removeClass('none');
    $(this).dequeue();
    });
  $('.tapar').delay(700).queue(function(){
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
  $('.tapar').delay(700).queue(function(){
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
function donar(producto_id){
  $('#producto').val(producto_id);
}

function enviarPedido(e){
  e.preventDefault();
  e.stopPropagation();
  if($('#producto').val() == ''){
    alert('No seleccionaste ningun producto.');
  }else{
    mostrarModal('Nos pondremos en contacto para hacerle llegar el pedido, gracias.');
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
        $('#twitter').val('');
        $('#producto').val('');        
        $(".tienda .listado ul li .boton a").removeClass('donado');
      },
      error: function(jqXHR, textStatus, errorThrown){
        alert(jqXHR.responseText);
      }
    });
  }
  
}

