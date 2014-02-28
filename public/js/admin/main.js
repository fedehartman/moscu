$(document).ready(function(){
    $('#form-clave').on('submit',doCambiarClave);
    $('.ver').on('click',ver);
    $('.ver-votos').on('click',verVotos);
    $('.ver-votos-ano').on('click',verVotosAno);
    $('.borrar').on('click',borrar);

    $('.buscar').on('click',function(){
      var valor = $('.input-buscar').val();

      window.location = BASE_PATH + '/admin/tweet/listado?buscar='+ valor;
    });
});

$('#modal-clave').on('show.bs.modal', function () {
    $("#form-clave .form-group").show();
    $("#form-clave .alert-modal").hide();
})

function doCambiarClave(e){
    $(".alert-modal").hide();
    $("#form-clave fieldset").toggle();
    e.preventDefault();
    if(!$("#form-clave").validate().form()) {                    
        return false;
    }else {
        var params = $('#form-clave').serialize();
        $.ajax({
            type: "post",
            url: BASE_PATH + '/admin/cambiar-clave',
            dataType: "json",
            data: params,
            success: function(data) {
                if(!data.error){
                    $("#form-clave .form-group").toggle();
                    $("#form-clave .alert-success").show(); 
                }else{
                    $("#form-clave .alert-danger").show();             
                }
            }
        });
    }
}

function ver(e){
  e.preventDefault();
  e.stopPropagation();

  var id = $(this).data('id');
  var modelo = $(this).data('modelo');
  $.ajax({
    type: "get",
    url: BASE_PATH + '/admin/' + modelo +'/ver/' + id,
    dataType: "html",
    success: function(data){
      $('#modal-ver .modal-title').html('Detalles');
      $('#modal-ver .modal-body').html(data);
      $('#modal-ver').modal('toggle');
    }
  });
}

function verVotos(e){
  e.preventDefault();
  e.stopPropagation();

  var cat_id = $(this).data('categoria');
  var twitero_id = $(this).data('twitero');
  $.ajax({
    type: "get",
    url: BASE_PATH + '/admin/ver-votos/' + cat_id + '/' + twitero_id,
    dataType: "html",
    success: function(data){
      $('#modal-ver .modal-title').html('Listado de Votos');
      $('#modal-ver .modal-body').html(data);
      $('#modal-ver').modal('toggle');
    }
  });
}

function verVotosAno(e){
  e.preventDefault();
  e.stopPropagation();

  var cat_id = $(this).data('categoria');
  var tweet_id = $(this).data('tweet');
  $.ajax({
    type: "get",
    url: BASE_PATH + '/admin/ver-votos-ano/' + cat_id + '/' + tweet_id,
    dataType: "html",
    success: function(data){
      $('#modal-ver .modal-title').html('Listado de Votos');
      $('#modal-ver .modal-body').html(data);
      $('#modal-ver').modal('toggle');
    }
  });
}

function borrar(e){
  e.preventDefault();
  e.stopPropagation();

  var id = $(this).data('id');
  var modelo = $(this).data('modelo');
  bootbox.confirm("¿Está seguro de querer borrar?", function(confirmed) {
    if (confirmed){
      $.ajax({
        type: "get",
        url: BASE_PATH + '/admin/' + modelo +'/borrar/' + id,
        dataType: "json",
        success: function(){
          $('#' + modelo + "_" + id).remove();
        },
        error: function(jqXHR, textStatus, errorThrown){
          if(jqXHR.status == 405){
            window.location.href = BASE_PATH + "/admin";
          } else{
            bootbox.alert({message: jqXHR.responseText});
          }
        }
      });
    }
  });
}