<?php

    session_start();
    require_once "conexionBD.php";
    $conn = conexion();

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if (isset($_SESSION['idusuario'], $_POST['sexo'], $_POST['edad'], $_POST['estatura'], $_POST['peso'], $_POST['tipoActividad'], $_POST['objetivo'])) {
        // Asignar valores a las variables si están definidas
        $idUsuario = $_SESSION['idusuario'];
        $sexo = $_POST['sexo'];
        $edad = $_POST['edad'];
        $estatura = $_POST['estatura'];
        $peso = $_POST['peso'];
        $actividad = $_POST['tipoActividad'];
        $objetivo = $_POST['objetivo'];
    
        $sql = "UPDATE usuarios 
            SET sexo = '$sexo', edad = '$edad', estatura = '$estatura', peso = '$peso', tipoactividad = '$actividad', configuracioncompleta = 'S', objetivo = '$objetivo'
            WHERE idusuario = $idUsuario";

        if($conn->query($sql) === TRUE) {
            $data['status'] = 'success';
        } else {
            $data['status'] = 'error';
        }
        echo json_encode($data);
    } else {
        $data['status'] = 'error';


        // Imprimir los datos en formato JSON
        echo json_encode($data);
    }
 
 
    // Cerrar conexión
    $conn->close();
?>