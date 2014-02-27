$(document).ready(function() {

$(".scrollbar1").tinyscrollbar();

/*$(".a00 .contenido").click(function(e) {
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
  });*/

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
