<?php
    require_once "conexionBD.php";
    session_start();
    $conexion = conexion();

    // Verificar si se recibieron los datos del formulario
    if(isset($_POST['usuario']) && isset($_POST['contraseña'])) {
        // Variables para el inicio de sesión
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        // Consulta para verificar el usuario y la contraseña
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'"; 
        $resultado = $conexion->query($sql);

        // Verificar si la consulta se ejecutó correctamente
        if($resultado) {
            // Verificar si se encontró algún resultado
            if ($resultado->num_rows > 0) {
                $fila = $resultado->fetch_assoc();
                $_SESSION['nombre'] = $fila['nombre'] . ' ' . $fila['apellido']; // Concatenar nombre y apellido
                $data['configuracion'] = $fila['configuracioncompleta'];
                $_SESSION['idusuario'] = $fila['idusuario']; // Obtener el id del usuario
                $data['status'] = 'success';
            } else {
                $data['status'] = 'error';
            }
        } else {
            // Si la consulta SQL falla
            $data['status'] = 'error';
        }

        // Devolver datos como formato JSON
        echo json_encode($data);

        // Cerrar conexión
        $conexion->close();
    } else {
        // Si no se recibieron los datos del formulario
        $data['status'] = 'error';
        echo json_encode($data);
    }
?>
