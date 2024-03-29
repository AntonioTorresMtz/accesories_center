document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("formulario").addEventListener('submit', validarMedidas);
});



function validarMedidas(evento){
    evento.preventDefault();
    var largo = document.getElementById("largo").value;
    var ancho = document.getElementById("ancho").value;

    if(ancho > largo){
        type='text/javascript'>Swal.fire(
            'Cuidado!',
            'El ancho es mas grande que el largo, verifica los campos',
            'warning'
          )
        return;
    }else{
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
                    console.log("muro")
                    if(document.getElementById('muro')){
                        console.log(document.getElementById('muro').value)
                        var muro = document.getElementById('muro').value;
                        if(muro == 0){
                            type='text/javascript'>Swal.fire(
                                'Error en el registro!',
                                'Selecciona primero un muro',
                                'error'
                              ) 
                              return;
                        } else{
                            if(document.getElementById('posicion')){
                                console.log("Posicion")
                                console.log(document.getElementById('posicion').value)
                                var posicion = document.getElementById('posicion').value;
                                if(posicion == 'vacio'){
                                    type='text/javascript'>Swal.fire(
                                        'Error en el registro!',
                                        'Selecciona primero una posicion',
                                        'error'
                                      ) 
                                    return; 
                                }else{
                                    this.submit();
                                }
                            }
                        }
                    } 
                }
            }else{
                this.submit();
            }  
        }
    } 
}