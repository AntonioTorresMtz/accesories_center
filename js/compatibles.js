$(document).ready(function () {
  $("#marca").change(function () {
    $("#marca option:selected").each(function () {
      producto = $(this).val();
      //console.log(producto)
      $.post(
        "select/modeloSelect9h.php",
        { producto: producto },
        function (data) {
          $("#modelo").html(data);
        }
      );
    });
  });

  $("#producto").change(function () {
    $("#producto option:selected").each(function () {
      producto = $(this).val();
      console.log("Producto");
      console.log(producto);
    });
  });

  $("#modelo").change(function () {
    $("#modelo option:selected").each(function () {
      modelo = $(this).val();
      console.log("Id de la mica 9h");
      console.log(modelo);
    });
  });

  $("#marca2").change(function () {
    $("#marca2 option:selected").each(function () {
      producto = $(this).val();
      //console.log(producto)
      $.post(
        "select/modeloSelect.php",
        { producto: producto },
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
