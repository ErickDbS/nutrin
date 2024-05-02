<?php
session_start();

if(isset($_SESSION['nombre'])) {
    include 'sidebar.php';
    include 'footer.php';
} else {
    header("Location: index.php");
    exit();
}
?>

<link rel="stylesheet" href="style/estiloCarrito.css">



<div id="carrito-container">
    <?php
        if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                // Obtener la información del producto desde la sesión
                $index = $item['index'];
                $cantidad = $item['cantidad'];
                $tipo = $item['tipo'];
                $imagen = $item['imagen'];
                $nombre = $item['nombre'];
                $tamaño = $item['tamaño'];
                $precio = $item['precio'];

                // Mostrar los detalles del producto en el carrito
                echo "<div class='producto-carrito'>";
                echo "<img src='{$imagen}' alt='{$nombre}'>";
                echo "<p>Tipo: {$tipo}</p>";
                echo "<p>Nombre: {$nombre}</p>";
                echo "<p>Tamaño(g): {$tamaño}</p>";
                echo "<p>Precio: {$precio}</p>";
                echo "<p>Cantidad: $cantidad</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay productos en el carrito.</p>";
        }


    ?>
</div>

<form action="">
    <input type="submit" value="Realizar Pago" class="pago">
</form>
