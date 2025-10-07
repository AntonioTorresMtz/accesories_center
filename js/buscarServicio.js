$(document).ready(function(){
    var busca = ''; // Valor inicial a enviar al servidor
    enviarDatos(busca); // Enviar datos al servidor inicialmente

    $('#buscar').on('keyup', function(){
        busca = $('#buscar').val();
        console.log(busca);
        enviarDatos(busca);
    });

    function enviarDatos(busca) {
        $.ajax({
            type: 'POST',
            url: 'buscar/buscadorServicios.php',
            data: {'busca': busca}
        })
        .done(function(resultado){
            $('#resultSer').html(resultado);
        })
        .fail(function(){
            alert("Ocurrió un error");
        });
    }
});

