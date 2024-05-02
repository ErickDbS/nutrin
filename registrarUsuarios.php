<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style/estiloRegistrarUsuarios.css">
    <script src="scriptsJS/registro.js"></script>
    <script src="jquery/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <h2>Registro</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="email" id="usuario" name="usuario" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" autocomplete="off" oninput="checkPasswordStrength()">
                <div id="passwordStrength">
                    <div id="strengthBar" style="height: 10px;"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de nacimiento:</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" autocomplete="off">
            </div>
        </form>
        <div class="btn-container">
            <button type="button" class="volverBtn" id="btnVolver" onclick="window.history.back();">Volver</button>
            <button type="submit" class="btn" onclick="validarCampos()">Registrarse</button>
        </div>
    </div>
</body>
</html>
