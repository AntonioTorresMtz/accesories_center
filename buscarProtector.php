<?php
include("includes/header.php");
?>
    <div class="container mt-4">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Protector</span>
        <input type="text" class="form-control" placeholder="Modelo" aria-label="Username" aria-describedby="basic-addon1" id="busca">
    </div>
</div>


<div class="container">
    <div class="table-responsive">
    <table class="table table-striped table-borderless table-hover">
        <thead>
            <tr>
            <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Posicion</th>
                <th>Muro</th>
            </tr>
        </thead>
        <tbody id="result">
            
        </tbody>
    </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/buscaProtector.js"></script>

<?php
include("includes/footer.php");
?>

