document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("formulario").addEventListener("submit", validar);
});

function validar(evento) {
  evento.preventDefault();
  var marca = document.getElementById("marca").value;
  if (marca == 0) {
    type =
      "text/javascript" >
      Swal.fire("Error en la venta!", "Selecciona primero una marca", "error");
    return;
  } else {
    if (document.getElementById("modelo")) {
      var modelo = document.getElementById("modelo").value;
      if (modelo == 0) {
        type =
          "text/javascript" >
          Swal.fire(
            "Error en la venta!",
            "Selecciona primero un modelo",
            "error"
          );
        return;
      } else {
        console.log("muro");
        if (document.getElementById("muro")) {
          console.log(document.getElementById("muro").value);
          var muro = document.getElementById("muro").value;
          if (muro == 0) {
            type =
              "text/javascript" >
              Swal.fire(
                "Error en el registro!",
                "Selecciona primero un muro",
                "error"
              );
            return;
          } else {
            if (document.getElementById("posicion")) {
              console.log("Posicion");
              console.log(document.getElementById("posicion").value);
              var posicion = document.getElementById("posicion").value;
              if (posicion == "vacio") {
                type =
                  "text/javascript" >
                  Swal.fire(
                    "Error en el registro!",
                    "Selecciona primero una posicion",
                    "error"
                  );
                return;
              } else {
                if (document.getElementById("tipo")) {
                  var tipo = document.getElementById("tipo").value;
                  if (tipo == 0) {
                    type =
                      "text/javascript" >
                      Swal.fire(
                        "Error al agregar!",
                        "Selecciona primero un tipo de protector",
                        "error"
                      );                    
                    return;
                  } else {
                    this.submit();
                  }
                }
              }
            }
          }
        }
      }
    } else {
      this.submit();
    }
  }
}
