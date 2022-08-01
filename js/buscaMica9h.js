$(document).ready(function(){
    $('#busca').focus();
    $('#busca').on('keyup', function(){
        var busca = $('#busca').val();
        //console.log(busca);
        $.ajax({
            type: 'POST',
            url: 'buscar/buscadorMica9H.php',
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
