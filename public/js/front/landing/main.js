$(document).ready(function () {

$(".last02").click(function(e) {
  e.preventDefault();
  $('.stage03').removeClass('none');
  $('.stage03').addClass('mov-stage03');
  return false;
  });

$(".text09").click(function(e) {
  e.preventDefault();
  $('.stage03').removeClass('mov-stage03');
  $('.stage03').addClass('mov-stage03b');
  return false;
  });

$(".text09").click(function(){
    setTimeout(function(){
      $('.stage03').removeClass('mov-stage03b');
       $(".stage03").addClass("none");
   }, 1000);
});

$(".stage03 figure").randombg({
    directory: "img/front/landing/gif/",
    howmany: 3
  });

});
