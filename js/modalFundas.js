// Mostrar el modal
document.addEventListener("click", function (event) {
  if (event.target.classList.contains("tipo_funda")) {
    console.log("Elemento clickeado:", event.target.id);
    mostrarModal();
  }
});

function mostrarModal() {
  document.getElementById("contenedor-modal").style.display = "block";
}

// Ocultar el modal
function ocultarModal() {
  document.getElementById("contenedor-modal").style.display = "none";
}
