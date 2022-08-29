$(document).ready(function (){
    $('#marca').change(function (){
        $('#marca option:selected').each(function (){
            producto = $(this).val();
            //console.log(producto)
            $.post('select/modeloSelect9h.php', {producto: producto},
            function(data){
                $("#modelo").html(data);
            });
        });
    })

    $('#modelo').change(function (){
        $('#modelo option:selected').each(function (){
            modelo = $(this).val();
            //console.log(producto)
            $.post('select/detalles9H.php', {modelo: modelo},
            function(data1){
                $("#detalles").html(data1);
            });
        });
    })

});