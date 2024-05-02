<?php
    session_start();
    if(isset($_SESSION['nombre'])) {
        // echo "Sesion activa";
        include 'sidebar.php';
        include 'footer.php';
    } else {
        header("Location: index.php");
        exit();
    }
?>

<link rel="stylesheet" href="style/estiloInicio.css">
<script src="scriptsJS/inicio.js"></script>

<div class="body-inicio">

    <div class="diaSemana">
        <div id="blanco">
            <h2 id="dia"></h2>
        </div>
    </div>

    <div class="contenedor">
        <div class="circle">
            <p class="numCalorias" id="calorias"></p>
            <p class="textCalorias">Calorias</p>
        </div>
        <div class="macros">
            <p id="carbohidratos"></p>
            <p id="proteinas"></p>
            <p id="grasas"></p>
        </div>
    </div>
</div>