console.log("Archivo detectado");
const soluciones = document.getElementById("solucion");
const observaciones = document.getElementById("contenedor-observaciones");
const rembolso = document.getElementById("contenedor-rembolso");
const campoRembolso = document.getElementById("rembolso");
const imei = document.getElementById("contenedor-imei");
const campoImei = document.getElementById("imei");
const diferencia = document.getElementById("contenedor-diferencia");
const campoDiferencia = document.getElementById("diferencia_favor");
const monto_diferencia = document.getElementById("contenedor-monto-diferencia");
const campoMonto_diferencia = document.getElementById("monto_diferencia");
const cantidad_efectivo = document.getElementById(
  "contenedor-cantidad-efectivo"
);
const campoCantidad_efectivo = document.getElementById("cantidad_efectivo");
const especie = document.getElementById("contenedor-especie");
const radioNula = document.getElementById("diferencia_nula");

soluciones.addEventListener("change", function () {
  switch (this.value) {
    case "1":
    case "4":
      observaciones.style.display = "block";
      imei.style.display = "none";
      diferencia.style.display = "none";
      rembolso.style.display = "none";
      monto_diferencia.style.display = "none";
      especie.style.display = "none";
      radioNula.checked = "true";
      campoRembolso.required = false;
      campoImei.required = false;
      campoDiferencia.required = false;
      campoMonto_diferencia.required = false;
      campoCantidad_efectivo.required = false;
      break;
    case "2":
      imei.style.display = "block";
      diferencia.style.display = "block";
      observaciones.style.display = "block";
      rembolso.style.display = "none";
      campoImei.required = true;
      campoDiferencia.required = true;
      campoRembolso.required = false;
      break;
    case "3":
      observaciones.style.display = "block";
      rembolso.style.display = "block";
      imei.style.display = "none";
      diferencia.style.display = "none";
      monto_diferencia.style.display = "none";
      especie.style.display = "none";
      radioNula.checked = "true";
      campoRembolso.required = true;
      campoImei.required = false;
      campoDiferencia.required = false;
      campoMonto_diferencia.required = false;
      campoCantidad_efectivo.required = false;
      break;
  }
});

const diferenciaRadioButtons = document.querySelectorAll(
  'input[name="diferencia"]'
);

diferenciaRadioButtons.forEach((radioButton) => {
  radioButton.addEventListener("change", () => {
    const selectedValue = radioButton.value;

    switch (selectedValue) {
      case "0":
        monto_diferencia.style.display = "block";
        campoMonto_diferencia.required = true;
        cantidad_efectivo.style.display = "block";
        campoCantidad_efectivo.required = true;
        especie.style.display = "block";
        break;
      case "1":
        monto_diferencia.style.display = "block";
        campoMonto_diferencia.required = true;
        cantidad_efectivo.style.display = "none";
        campoCantidad_efectivo.required = false;
        especie.style.display = "none";
        break;
      case "2":
        monto_diferencia.style.display = "none";
        campoMonto_diferencia.required = false;
        especie.style.display = "none";
        cantidad_efectivo.style.display = "none";
        campoCantidad_efectivo.required = false;
        break;
    }
  });
});
