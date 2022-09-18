<script>
		var evita=0;
      $(function(){
      // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
      $("#adicional").on('click', function(){
        $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
        evita= evita+1;
      });
     
      // Evento que selecciona la fila y la elimina 
      $(document).on("click",".eliminar",function(){
        if(evita > 0){
          var parent = $(this).parents().get(0);
          $(parent).remove();
          evita = evita - 1;
        }
      });
    });

  var evitaTipo=0;
    $(function(){
      // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
      $("#adicionalTipo").on('click', function(){
        $("#tablaTipo tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tablaTipo");
        evitaTipo= evitaTipo+1;
      });
     
      // Evento que selecciona la fila y la elimina 
      $(document).on("click",".eliminarTipo",function(){
      if(evitaTipo > 0){
          var parent = $(this).parents().get(0);
          $(parent).remove();
          evitaTipo = evitaTipo - 1;
        }
      });
    });

  </script>

<div class="pie">
    
</div>
</body>
</html>