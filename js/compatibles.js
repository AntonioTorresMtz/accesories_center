var tipoProducto = 0;
modelo_global = 0;
producto_global = 0;

$(document).ready(function () {
  $("#marca").change(function () {
    $("#marca option:selected").each(function () {
      producto = $(this).val();
      marca = producto;
      producto_global = producto;
      //console.log(producto)
      console.log("Producto: " + tipoProducto);
      switch (tipoProducto) {
        case "1":
          $.post(
            "select/modeloSelect9h.php",
            { producto: producto },
            function (data) {
              $("#modelo").html(data);
            }
          );
          break;
        case "2":
          $.post(
            "select/modeloSelect9d.php",
            { producto: producto },
            function (data) {
              $("#modelo").html(data);
            }
          );
          break;
        case "3":
          $.post(
            "select/modeloSelect100d.php",
            { producto: producto },
            function (data) {
              $("#modelo").html(data);
            }
          );
          break;
        case "4":
          $.post(
            "select/modeloSelectCamara.php",
            { producto: producto },
            function (data) {
              $("#modelo").html(data);
            }
          );
          break;
        case "5":
          console.log("Cincooo");
          $.post(
            "select/modeloSelectCurva.php",
            { producto: producto },
            function (data) {
              $("#modelo").html(data);
            }
          );
          break;
        case "6":
          console.log("Seis");
          $.post(
            "select/protectorModelo.php",
            { marca: marca },
            function (data) {
              $("#modelo").html(data);
            }
          );
          break;
      }
    });
  });

  $("#producto").change(function () {
    $("#producto option:selected").each(function () {
      tipoProducto = $(this).val();
      console.log("Producto:");
      console.log(tipoProducto);
      var marcaSelect = $("#marca");
      marcaSelect.val("1");
    });
  });

  $("#modelo").change(function () {
    $("#modelo option:selected").each(function () {
      modelo = $(this).val();
      modelo_global = modelo;
      console.log("Id de la mica 9h");
      console.log(modelo);
    });
  });

  $("#marca2").change(function () {
    $("#marca2 option:selected").each(function () {
      marca = $(this).val();
      //console.log(producto)
      $.post(
        "select/selectModelosNoCompatibles.php",
        { marca: marca, id: modelo_global, producto: tipoProducto },
        function (data) {
          $("#modelo2").html(data);
        }
      );
    });
  });

  $("#modelo2").change(function () {
    $("#modelo2 option:selected").each(function () {
      modelo = $(this).val();
      console.log("Id del modelo 2");
      console.log(modelo);
    });
  });
});
