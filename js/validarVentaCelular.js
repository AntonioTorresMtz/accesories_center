let validando = false;

document.getElementById("formulario").addEventListener("submit", function (e) {
  if (validando) return; // Permite el envío si ya fue validado
  e.preventDefault(); // Evita el envío inmediato

  const imei = document.getElementById("imei").value;

  fetch("select/verificarImei.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "imei=" + encodeURIComponent(imei),
  })
    .then((res) => res.text())
    .then((data) => {
      if (data === "existe") {
        validando = true; // Marca que la validación ya pasó
        document.getElementById("formulario").submit(); // Ahora sí se envía
      } else {
        Swal.fire({
          title: "Teléfono no encontrado",
          text: "¡Verifica si has ingresado el IMEI correcto!",
          icon: "info",
        });
      }
    })
    .catch((err) => console.error("Error en la verificación:", err));
});
