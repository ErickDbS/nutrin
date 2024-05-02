<?php
    session_start();
    if(isset($_SESSION['nombre'])) {
        // echo "Sesion activa";
        include 'sidebar.php';
        include 'footer.php'; 
    } else {
        header("Location: index.php");
        exit();
    }
?>

<link rel="stylesheet" href="style/estiloPerfilUsuario.css">
<script src="scriptsJS/usuario.js"></script>

<div class="usuario-info">
    <div class="detalles">
        <details>
            <summary>Configuración</summary>
            <input type="checkbox" id="contraseña" name="checkbox" onchange="desbloquearContraseñas()"/>
            <label for="cbox2">Cambiar contraseña</label>
            <div id="contraUsuario" style="display: none;">
                <label>Contraseña nueva: </label><input type="password" id="contraseñaNueva" />
                <label>Confirmar contraseña: </label><input type="password" id="confirmarContraseña" oninput="validarContraseña()"/>
                <label id="contraseñasCoinciden" style="color: green;"></label>
                <button type="button" class="btn btn-primary" style="width: 100px;" disabled id="cambiarContraseña">Guardar Cambios</button>
            </div>
            <br>
            <input type="checkbox" id="telefono" name="checkbox" onchange="desbloquearTelefono()"/>
            <label>Añadir numero de telefono</label>
            <div id="numeroTelefono" style="display: none;">
                <label>Añadir numero telefonico: </label><input type="number" id="añadirNumero">
            </div>
        </details>
        <details>
            <summary>Metodos de pago</summary>
            Este es otro ejemplo de lo que llevara el detalle de metodos de pago
        </details>
    </div>
</div>