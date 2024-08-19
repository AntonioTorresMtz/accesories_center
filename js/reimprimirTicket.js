// Ejemplo de función para manejar la reimpresión
function reimprimir(id) {
  const datos = {
    idVenta: id
  };

  // Envía los datos al servidor usando POST
  fetch("registros/reimprimirTicketTelefono.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(datos), // Convierte los datos a JSON
  })
    .then((response) => response.json()) // Convierte la respuesta a JSON
    .then((data) => {
      console.log("Respuesta del servidor:", data);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
