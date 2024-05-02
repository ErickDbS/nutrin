<?php

    session_start();
    require_once "conexionBD.php";
    $conn = conexion();

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $idUsuario = $_SESSION['idusuario'];

    $sql = "SELECT sexo, edad, estatura, peso, tipoactividad, objetivo FROM usuarios WHERE idusuario = $idUsuario";

    $result = $conn->query($sql);

    $data = [];

    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();

    echo json_encode($data);

?>