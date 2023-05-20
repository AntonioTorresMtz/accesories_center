$(document).ready(function(){
    var busca = ''; // Valor inicial a enviar al servidor
    enviarDatos(busca); // Enviar datos al servidor inicialmente

    $('#imei').on('keyup', function(){
        busca = $('#imei').val();
        console.log(busca);
        enviarDatos(busca);
    });

    function enviarDatos(busca) {
        $.ajax({
            type: 'POST',
            url: 'buscar/buscadorCelular.php',
            data: {'busca': busca}
        })
        .done(function(resultado){
            $('#result').html(resultado);
        })
        .fail(function(){
            alert("Ocurrió un error");
        });
    }
});

