import { GoogleGenerativeAI } from "@google/generative-ai";
import { clave } from "../key.js";

var telefono1 = false;
var telefono2 = false;
var modelo1 = "";
var modelo2 = "";

$(document).ready(function () {
  $("#telefono1").focus();
  $("#telefono1").on("keyup", function () {
    var busca = $("#telefono1").val();
    $.ajax({
      type: "POST",
      url: "buscar/compararTelefono.php",
      data: { busca: busca },
      dataType: "json", // Especifica que la respuesta es JSON
    })
      .done(function (respuesta) {
        // Limpia el contenedor antes de mostrar el resultado
        $("#result1").empty();
        telefono1 = respuesta.resultado;
        console.log("Respuesta del server: " + respuesta.resultado);

        if (respuesta.resultado) {
          modelo1 = respuesta.data[0].modelo;
          console.log(respuesta.data);
          respuesta.data.forEach(function (telefono) {
            $("#result1").append(
              "<p><b>Teléfono:</b> " + telefono.modelo + "</p>"
            );
          });
        } else {
          // Muestra el mensaje de error si no se encontraron resultados
          $("#result").append("<p> " + respuesta.mensaje + "</p>");
        }
      })
      .fail(function () {
        alert("Ocurrió un error");
      });
  });
});

$(document).ready(function () {
  $("#telefono2").focus();
  $("#telefono2").on("keyup", function () {
    var busca = $("#telefono2").val();
    $.ajax({
      type: "POST",
      url: "buscar/compararTelefono.php",
      data: { busca: busca },
      dataType: "json", // Especifica que la respuesta es JSON
    })
      .done(function (respuesta) {
        // Limpia el contenedor antes de mostrar el resultado
        $("#result2").empty();
        telefono2 = respuesta.resultado;
        console.log("Respuesta del server: " + respuesta.resultado);
        if (respuesta.resultado) {
          modelo2 = respuesta.data[0].modelo;
          // Itera sobre los resultados y muestra cada uno
          respuesta.data.forEach(function (telefono) {
            $("#result2").append(
              "<p><b>Teléfono:</b> " + telefono.modelo + "</p>"
            );
          });
        } else {
          // Muestra el mensaje de error si no se encontraron resultados
          $("#resul2").append("<p> " + respuesta.mensaje + "</p>");
        }
      })
      .fail(function () {
        alert("Ocurrió un error");
      });
  });
});

const genAI = new GoogleGenerativeAI(clave);
const model = genAI.getGenerativeModel({ model: "gemini-1.5-flash" });

document.querySelector("#boton").addEventListener("click", async () => {
  console.log("Se oprimio el boton");
  var promp =
    "Me podrias decir cual es la diferencia entre el " +
    modelo1 +
    " y el " +
    modelo2 + " puedes darme la respuesta en  formato HTML por favor. Si te es posible apoyarte tambien de informacion de internet ademas de la que te proporcione.";
  console.log(promp);
  const respuesta = document.querySelector("#respuesta");
  try {
    const result = await model.generateContent(promp);
    const response = await result.response;
    const text = response.text();
    respuesta.innerHTML = text;
    console.log(text);
  } catch (error) {
    console.log(error);
  }
});
