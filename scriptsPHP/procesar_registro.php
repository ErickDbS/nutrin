<?php
    require_once "conexionBD.php";
    $conn = conexion();

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Verificar si se enviaron todos los datos del formulario
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['usuario']) && isset($_POST['contraseña']) && isset($_POST['fecha'])) {
        // Obtener datos del formulario
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $fecha = $_POST['fecha'];

        // Consulta SQL para verificar si el usuario ya existe
        $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $result = $conn->query($query);

        // Verificar si se encontraron resultados (usuario existente)
        if($result->num_rows > 0) {
            $data['status'] = 'existe';
        } else {
            // Consulta SQL para insertar datos en la base de datos
            $sql = "INSERT INTO usuarios (nombre, apellido, usuario, contraseña, fechanacimiento)
                VALUES ('$nombre', '$apellidos', '$usuario', '$contraseña','$fecha')";
            
            if ($conn->query($sql) === TRUE) {
                $data['status'] = 'success';
            } else {
                $data['status'] = 'error';
            }
        }

        // Enviar respuesta al cliente
        echo json_encode($data);

        // Cerrar conexión
        $conn->close();
    } else {
        // Si no se recibieron todos los datos del formulario
        $data['status'] = 'error';
        echo json_encode($data);
    }
?>
