$(document).ready(function (){
    $('#marca').change(function (){
        $('#marca option:selected').each(function (){
            producto = $(this).val();
            //console.log(producto)
            $.post('select/ventasSelect_camara.php', {producto: producto},
            function(data){
                $("#modelo").html(data);
            });
        });
    })
});