<?php
    session_start();
    if(isset($_SESSION['nombre'])) {
        // echo "Sesion activa";
    } else {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrina</title>
    <link rel="stylesheet" href="style/configuracionDietas.css">
    <script src="scriptsJS/configuracionUsuario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="jquery/jquery-3.7.1.min.js"></script>
</head>
<body>

    <div class="config-label">
        <h1>Empezemos con unas configuraciones basicas</h1>
        <h3>Proporcionanos la siguiente informacion</h3>
    </div>

    <div class="informacion">
        <!-- <div class="info-div"> -->
            <form method='POST'>
            <div>
                <label for="Objetivo">Objetivo</label><br>
                <select id="objetivo" class="select-info" name="objetivo">
                        <option value="-1">Selecciona un objetivo</option>
                        <option value="bajar">Bajar de peso</option>
                        <option value="mantener">Mantenimiento</option>
                        <option value="subir">Subir de peso</option>
                    </select>
                </div>
                <br>
                <div>
                    <label for="sexo">Sexo</label><br>
                    <select id="sexo" class="select-info" name="sexo">
                        <option value="-1">Selecciona una opcion</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                    </select>
                </div>
                <br>
                <div>
                    <label for="edad">Edad</label><br>
                    <input type="number"class="campos" id="edad" name="edad">
                </div>
                <br>
                <div>
                    <label for="estatura">Estatura</label>
                    <input type="number"class="campos" id="estatura" name="estatura">
                </div>
                <br>
                <div>
                    <label for="peso">Peso</label>
                    <input type="number"class="campos" id="peso" name="peso">
                </div>
                <br>
                <div>
                    <label>Tipo de actividad: </label><br>
                    <select id="actividad" class="select-info" name="actividad">
                        <option value="-1">Selecciona una opcion</option>
                        <option value="poco activo">Poco activo</option>
                        <option value="moderado">Moderado</option>
                        <option value="activo">Activo</option>
                        <option value="muy activo">Muy activo</option>
                    </select>
                </div>
            </form>
            <div class="info-button">
                <div id="divGuardar">
                    <button type="button" id="continuar" onclick="continuarDatos()">Continuar</button>
                </div>
                <!-- <div id="divSalir">
                    <button type="button" id="salir">Cerrar Sesión</button>
                </div> -->
            </div>
        <!-- </div> -->
    </div>
</body>
</html>