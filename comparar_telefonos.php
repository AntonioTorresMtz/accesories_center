<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/apartadosMensaje.php")
    ?>

<div class="container">
    <div>
        <h1 class="text-center m-4">Compara telefonos</h1>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="marca" class="form-label">Telefono 1</label>
            <input class="form-control" type="text" name="telefono1"
                placeholder="Escribe el IMEI del primer telefono a comparar" required id="telefono1">
            <div id="result1"></div>
        </div>
        <div class="col-6">
            <label for="marca" class="form-label">Telefono 2</label>
            <input class="form-control" type="text" name="telefono2"
                placeholder="Escribe el IMEI del segundo telefono a comparar" required id="telefono2">
            <div id="result2"></div>
        </div>
    </div>
    <div class="col-12 text-center mt-2">
        <button type="button" class="btn btn-dark" id="boton">Comparar</button>
    </div>
    <div class="col-12">
        <div id="respuesta"></div>
    </div>
</div>

<div class="row contenedor-loader">
    <div class="loader col-12"></div>
    <div class="col-12 text-center">
        <p>Comparando modelos...</p>
    </div>
</div>


<style>
    .negro {
        background: white;
    }

    .contenedor-loader {
        display: flex;
        justify-content: center;
        flex-direction: row;
        align-items: center;
        background-color: rgba(0, 0, 0, .3);
    }

    .loader {
        border: 16px solid #f3f3f3;
        /* Color de borde */
        border-top: 16px solid #3498db;
        /* Color de la parte superior */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<script type="importmap">
      {
        "imports": {
          "@google/generative-ai": "https://esm.run/@google/generative-ai"
        }
      }
    </script>
<script src="js/buscarComparar.js" type="module"></script>
<script src="js/buscaPersonalizada.js"></script>