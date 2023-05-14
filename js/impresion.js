function imprimirTexto() {
    var texto = "¡Hola, mundo!"; // Texto a imprimir
    
    // Crea un elemento de página oculto para contener el texto
    var div = document.createElement('div');
    div.innerHTML = texto;
    div.style.display = 'none';
    document.body.appendChild(div);
    
    // Imprime el contenido del elemento de página
    window.print();
    
    // Elimina el elemento de página después de la impresión
    document.body.removeChild(div);
  }