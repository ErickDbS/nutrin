<?php
    session_start();
    require_once "conexionBD.php";
    $conn = conexion();

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM productos   ";
    $result = $conn->query($sql);

    // Array para almacenar los datos
    $data = [];

    // Verifica si hay resultados
    if ($result->num_rows > 0) {
        // Recorre los resultados
        while ($row = $result->fetch_assoc()) {
            // Agrega cada fila al array
            $data[] = $row;
        }
    }

    // Cierra la conexión
    $conn->close();

    // Convierte el array en JSON y envía la respuesta
    echo json_encode($data);

?>