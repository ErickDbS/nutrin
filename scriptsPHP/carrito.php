<?php
session_start();

if(isset($_SESSION['nombre'])) {
    if(isset($_POST['index']) && isset($_POST['cantidad'])) {
        // Obtener la información del producto enviada desde el cliente
        $index = $_POST['index'];
        $cantidad = $_POST['cantidad'];
        $tipo = $_POST['tipo'];
        $imagen = $_POST['imagen'];
        $nombre = $_POST['nombre'];
        $tamaño = $_POST['tamaño'];
        $precio = $_POST['precio'];

        // Obtener la lista de productos guardada en la sesión
        $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];

        // Agregar el producto al carrito
        $carrito[] = array('index' => $index, 'cantidad' => $cantidad, 'tipo' => $tipo, 'imagen' => $imagen, 'nombre' => $nombre, 'tamaño' => $tamaño, 'precio' => $precio);

        // Guardar el carrito actualizado en la sesión
        $_SESSION['carrito'] = $carrito;

        // Respondemos al cliente con éxito
        echo json_encode(array('success' => true));
    } else {
        // Si falta información, respondemos con error
        echo json_encode(array('success' => false));
    }
} else {
    // Si el usuario no está logueado, respondemos con error
    echo json_encode(array('success' => false));
}

?>
