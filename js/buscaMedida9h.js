$(document).ready(function (){
  $('#ancho').change(function (){
      $('#marca option:selected').each(function (){
          producto = $(this).val();
          //console.log(producto)
          $.post('select/modeloSelect.php', {producto: producto},
          function(data){
              $("#modelo").html(data);
          });
      });
  })

});

/*$(document).ready(function(){
    $('#busca').focus();
    $('#busca').on('keyup', function(){
        var busca = $('#busca').val();
        //console.log(busca);
        $.ajax({
            type: 'POST',
            url: 'buscar/buscadorMedidas.php',
            data: {'busca': busca}
        })

        .done(function(resultado){
            $('#result').html(resultado);
        })
        .fail(function(jqXHR, textStatus, errorThrown ){
            if (jqXHR.status === 0) {

                alert('Not connect: Verify Network.');
            
              } else if (jqXHR.status == 404) {
            
                alert('Requested page not found [404]');
            
              } else if (jqXHR.status == 500) {
            
                alert('Internal Server Error [500].');
            
              } else if (textStatus === 'parsererror') {
            
                alert('Requested JSON parse failed.');
            
              } else if (textStatus === 'timeout') {
            
                alert('Time out error.');
            
              } else if (textStatus === 'abort') {
            
                alert('Ajax request aborted.');
            
              } else {
            
                alert('Uncaught Error: ' + jqXHR.responseText);
            
              }
        })
    })

})*/
