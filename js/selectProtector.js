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
            model = $(this).val();
            console.log(model)
            $.post('select/ventasFunda_tipo.php', {model: model},
            function(data1){
                $("#tipo").html(data1);
            });
        });
    })

});

