$(document).ready(function (){
    $('#producto').change(function (){
        $('#producto option:selected').each(function (){
            producto = $(this).val();
            //console.log(producto)
            $.post('select/ventasSelect.php', {producto: producto},
            function(data){
                $("#modelo").html(data);
            });
        });
    })
});