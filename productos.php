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

<link rel="stylesheet" href="style/estiloProductos.css">
<script src="scriptsJS/productos.js"></script>

<section class="filtros" style="font-family: sans-serif">
    <div class="filtro-color">
        <header>
            <h2>Filtros</h2>
        </header>
        <div class="info-filtros">
            <label>Marca: </label>
            <select>
                <option value="-1">Selecione una marca</option>
            </select>
            <label>Tamaño: </label>
            <select>
                <option value="-1">Seleccione un tamaño</option>
            </select>
            <label>Precio: </label>
            <select>
                <option value="-1">Seleccione un precio</option>
            </select>
           
        </div>
    </div>
</section>

<div class="productos-grid" id="productos-grid">
    <!-- Los productos se agregarán aquí -->
</div>