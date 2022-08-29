$(document).ready(function (){
    $('#marca').change(function (){
        $('#marca option:selected').each(function (){
            marca = $(this).val();
            console.log(modelo)
            $.post('select/protectorModelo.php', {marca: marca},
            function(data){
                $("#modelo").html(data);
            });
        });
    })
});