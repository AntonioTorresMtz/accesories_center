$(document).ready(function (){
    $('#marca').change(function (){
        $('#marca option:selected').each(function (){
            producto = $(this).val();
            //console.log(producto)
            $.post('select/modeloSelect.php', {producto: producto},
            function(data){
                $("#modelo").html(data);
            });
        });
    })

    $('#modelo').change(function (){
        $('#modelo option:selected').each(function (){
            modelo = $(this).val();
            console.log(modelo)
            $.post('select/compatibles.php', {modelo: modelo},
            function(data){
                $("#compatibles").html(data);
            });
        });
    })


});