<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrina - Iniciar Sesión</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="Nutrina.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="jquery/jquery-3.7.1.min.js"></script>
    <script src="scriptsJS/scriptLogin.js"></script>
</head>
<body>
    <header>
        <h1>Nutrina</h1>
    </header>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="#">Preguntas Frecuentes</a>
        <a href="productos.php">Productos</a>
    </nav>

    <div class="login-container">
        <h2>Inicio de Sesión</h2>
        <form class="login-form" method="post">
            <input type="text" id="Usuario" name="Usuario" placeholder="Usuario" autocomplete="off" required>
            <input type="password" id="Contraseña" name="Contraseña" placeholder="Contraseña" autocomplete="off" required>
            <button type="submit" id="login-button" onclick="verificarInicio()">Iniciar Sesión</button>
        </form>
        <button class="signup-button" onclick="location.href='registrarUsuarios.php'">Registrarse</button>
    </div>
      
    <footer>
        <p>Copyright © 2024 Nutrina</p>
    </footer>
</body>
</html>
