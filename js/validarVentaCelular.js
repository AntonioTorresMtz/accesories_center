document.getElementById("formulario").addEventListener("submit", function (e) {
  e.preventDefault(); // Evita el envío inmediato

  const imei = document.getElementById("imei").value;

  fetch("../select/verificarImei.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "imei=" + encodeURIComponent(imei),
  })
    .then((res) => res.text())
    .then((data) => {
      console.log(imei);
      if (data === "existe") {
        document.getElementById("formulario").submit();
      } else {
        //Si no se encuentra el IMEI o ID se muestra un mensaje de advertencia
        Swal.fire({
          title: "Telefono no encontrado",
          text: "¡Verifica si has ingresado el IMEI correcto!",
          icon: "info",
        });
      }
    })
    .catch((err) => console.error("Error en la verificación:", err));
});
