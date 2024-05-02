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
    
    
    
    <link rel="stylesheet" href="style/estiloVistaProductos.css">
    <div class="producto">
        <img src="img/61jte38DR0L._AC_UF1000,1000_QL80_.png" class="producto-imagen" alt="">
        <div class="producto-info">
            <h4>Nombre del producto</h4>
            <p class="precio">$559.00</p>
            <input type="number" name="" id="">
            <button type="submit">Comprar Ahora</button>
            <button type="submit">Agregar al carrito</button>
        </div>
    </div>

    <div class="descripcion">
        <h4>Descripcion</h4>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit illum ex itaque voluptatum nemo esse voluptate harum ipsam dignissimos, eius soluta laudantium in animi minus nulla, odio asperiores. Molestiae, quae?</p>
    </div>
    
