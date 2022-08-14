$(document).ready(function (){
    $('#muro').change(function (){
        $('#muro option:selected').each(function (){
            muro = $(this).val();
            //console.log(producto)
            $.post('select/muroSelect.php', {muro: muro},
            function(data){
                $("#posicion").html(data);
            });
        });
    })
});