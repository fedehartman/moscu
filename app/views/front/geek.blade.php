<div class="modal modal-geek">
  <div class="modalbody">
    <div class="close" id="gran_close"></div>
    <figure></figure>
    <p>¿Cuál era el code que te daba un toco de plata en Los Sims?</p>
    <form id="form-gran">
      <input type="text" placeholder="Acá tu respuesta" name="respuesta" />
      <input type="submit" class="submit" value="Enviar">
    </form>
    <div class="msg none" id="msg_gran" style="display:none;"></div>
  </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#form-gran').on('submit',granGran);
  });

  $("#gran_close").click(function(e) {
    $(".a00, .a01, .a02, .a03, .a04, header, footer").removeClass('blur');
    $("#gran").html('');
    $("#gran").addClass('none');
    return false;
  });

  function granGran(e){
    e.preventDefault();
    e.stopPropagation();
    var params = $('#form-gran').serialize();
    $.ajax({
      type: "post",
      url: BASE_PATH + '/gran-gran',
      dataType: "json",
      data: params,
      success: function(data){
        if(data.error){
          $('#msg_gran').addClass('msg-error');
          $('#msg_gran').html(data.msg);
          $('#msg_gran').show();
        }else{
          $('#msg_gran').addClass('msg-ok');
          $('#msg_gran').html(data.msg);
          $('#msg_gran').show();
        }
      }
    });
  }
</script>