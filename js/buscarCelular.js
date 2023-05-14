$(document).ready(function(){
    $('#imei').focus();
    $('#imei').on('keyup', function(){
        var busca = $('#imei').val();
        //console.log(busca);
        $.ajax({
            type: 'POST',
            url: 'buscar/buscadorCelular.php',
            data: {'busca': busca}
        })

        .done(function(resultado){
            $('#result').html(resultado);
        })
        .fail(function(){
            alert("Ocurrio un error");
        })
    })
})
