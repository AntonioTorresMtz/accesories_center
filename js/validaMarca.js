document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("formulario").addEventListener('submit', validarMarca);
});



function validarMarca(evento){
    evento.preventDefault();
    var marca = document.getElementById("marca").value;
    if(marca == 0){
        type='text/javascript'>Swal.fire(
            'Error en la venta!',
            'Selecciona primero una marca',
            'error'
          )
        return;
    }else{
        if(document.getElementById('marca')){
            var modelo = document.getElementById('modelo').value;
            if(modelo == 0){
                type='text/javascript'>Swal.fire(
                    'Error en la venta!',
                    'Selecciona primero un modelo',
                    'error'
                  )
                return;   
            } else{
                this.submit();
            }
        }else{
            this.submit();
        }  
    }
    
}