$(document).ready(function (){
    $('#marca').change(function (){
        $('#marca option:selected').each(function (){
            producto = $(this).val();
            //console.log(producto)
            $.post('select/ventasSelect9d.php', {producto: producto},
            function(data){
                $("#modelo").html(data);
            });
        });
    })
});