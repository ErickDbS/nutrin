$(document).ready(function() {
    $(document).keypress(function(e) {
        // Verificar si la tecla presionada es Enter (código 13)
        if (e.which == 13) {
            // Ejecutar la acción que desees, por ejemplo, hacer clic en el botón de inicio de sesión
            verificarInicio();
        }
    });
    setTimeout(() => {
        limpiarCampos();    
    }, 30000);
});

function verificarInicio() {
    let usuario = $("#Usuario").val();
    let contraseña = $("#Contraseña").val();

    if(usuario == "") {
        Swal.fire({
            title: "Error",
            position: "top-end",
            text: "Por favor, escribe un usuario para continuar",
            icon: "error",
            showConfirmButton: false,
            timerProgressBar: true,
            timer: 1800,
        });
        return;
    }
    if(contraseña == "") {
        Swal.fire({
            title: "Error",
            position: "top-end",
            text: "Por favor, escribe una contraseña para continuar",
            icon: "error",
            showConfirmButton: false,
            timerProgressBar: true,
            timer: 1800
        });
        return;
    }

    $.ajax({
        type: 'POST',
        url: 'scriptsPHP/login.php',
        dataType: "json",
        data: { 
            usuario : usuario, 
            contraseña : contraseña
        },
        success: function(data) {
            if(data.status == 'success') {
                if(data.configuracion !== 'S') {
                    window.location.href = 'configuracionesDieta.php';
                } else {
                    window.location.href = 'inicio.php';
                }
            } else {
                Swal.fire({
                    title: "Error",
                    position: "top-end",
                    text: "Usuario o contraseña incorrecto.",
                    icon: "error",
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 1800
                });
            }
        },
        fail: function(jqXHR, textStatus, errorThrown) {
            window.location.href = 'hola.php';
            console.log("Error en la solicitud AJAX:", textStatus, errorThrown);
            Swal.fire({
                title: "Error",
                position: "top-end",
                text: "Ha ocurrido un error en la solicitud. Por favor, inténtalo de nuevo más tarde.",
                icon: "error",
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 1800
            });
        }
    });
}

function limpiarCampos() {
    $('#Usuario').val("");
    $("#Contraseña").val("");
}