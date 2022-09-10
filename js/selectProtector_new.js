$(document).ready(function (){
    $('#marca').change(function (){
        $('#marca option:selected').each(function (){
            producto = $(this).val();
            //console.log(producto)
            $.post('select/ventasFunda_modelo.php', {producto: producto},
            function(data){
                $("#modelo").html(data);
            });
        });
    })

    $('#modelo').change(function (){
        $('#modelo option:selected').each(function (){
            modelo = $(this).val();
            //console.log(producto)
            $.post('select/detallesProtector.php', {modelo: modelo},
            function(data1){
                $("#detalles").html(data1);
            });
        });
    })

});

