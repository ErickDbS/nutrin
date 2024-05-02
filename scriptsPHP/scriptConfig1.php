<?php
session_start();

require_once "conexionBD.php";

$conn = conexion();

// Obtener datos del formulario
$sexo = $_POST['Sexo'];
$edad = $_POST['Edad'];
$estatura = $_POST['Estatura'];
$peso = $_POST['Peso'];
$actividad = $_POST['actividad'];

$sql_insert = "INSERT INTO configuraciondietas (sexo, edad, altura, peso, actividad)
        VALUES ('$sexo', '$edad', '$estatura', '$peso', '$actividad')";

// Ejecutar las consultas SQL
if ($conn->query($sql_insert) === TRUE) {
    header("Location: scriptActualizarConfi.php");
} else {
    echo "Error al insertar datos: " . $conn->error;
};

// Cerrar conexión
$conn->close();


?>