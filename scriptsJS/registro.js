async function validarCampos() {
    let nombre = $("#nombre").val();
    let apellido = $("#apellidos").val();
    let usuario = $("#usuario").val();
    let contraseña = $("#contrasena").val();
    let fecha = $("#fechaNacimiento").val();

    if(nombre == "" || apellido == "" || usuario == "" || contraseña == "" || fecha == "") {
        Swal.fire({
            title: "Error",
            position: "top-end",
            text: "Faltan algunos campos por llenar",
            icon: "error",
            showConfirmButton: false,
            timerProgressBar: true,
            timer: 1800
        });
        return;
    }

    let validar = await validarContraseña(contraseña);
    if(validar == false) {
        Swal.fire({
            title: "Error",
            position: "top-end",
            text: "La contraseña es demasiado fácil. Por favor introduce una nueva",
            icon: "error",
            showConfirmButton: false,
            timerProgressBar: true,
            timer: 1800
        });
        return;
    }

    Swal.fire({
        toast: true,
        position: 'top-end',
        title: 'Cargando...',
        showConfirmButton: false,
        background: '#fff linear-gradient(145deg, rgba(255,255,255,1) 30%, rgba(0,136,204,1) 100%',
        didOpen: () => {
            Swal.showLoading();
        }
    });

    await new Promise(resolve => {
        setTimeout(() => {
            resolve();
        }, 900);
    }) 

    $.ajax({
        type: 'POST',
        url: 'scriptsPHP/procesar_registro.php',
        dataType: "json",
        data: { 
            nombre : nombre, 
            apellido : apellido,
            usuario : usuario,
            contraseña : contraseña, 
            fecha : fecha
        },
        success: function(data) {
            if(data.status == 'existe') {
                Swal.fire({
                    title: "Aviso",
                    position: "top-end",
                    text: "El usuario ya existe. Intente con otro",
                    icon: "warning",
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 1800
                });
                return;
            }
            if(data.status == 'success') {
                Swal.fire({
                    title: "Exito",
                    position: "top-end",
                    text: "Guardado con exito",
                    icon: "success",
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 1800,
                }).then(() => {
                    limpiarCampos();
                })
            } else {
                Swal.fire({
                    title: "Error",
                    position: "top-end",
                    text: "No se ha guardado. Intentelo de nuevo",
                    icon: "error",
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 1800
                }).then(() => {
                    limpiarCampos();
                })
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
    $('#nombre').val('');
    $('#apellidos').val('');
    $('#usuario').val('');
    $('#contrasena').val('');
    $('#fechaNacimiento').val('');

}

function validarContraseña(contraseña) {
    // Expresión regular para detectar secuencias numéricas ascendentes
    const patronAscendente = /012|123|234|345|456|567|678|789|890/;
    // Expresión regular para detectar secuencias numéricas descendentes
    const patronDescendente = /987|876|765|654|543|432|321|210/;

    // Verificar si la contraseña contiene una secuencia numérica ascendente o descendente
    if (patronAscendente.test(contraseña) || patronDescendente.test(contraseña)) {
        return false;
    }

    // La contraseña es válida si no contiene secuencias numéricas consecutivas
    return true;
}

function checkPasswordStrength() {
    const password = $('#contrasena').val();
    const strengthBar = $('#strengthBar');

    // Criterios para evaluar la fortaleza de la contraseña
    let strength = 0;

    // Longitud de al menos 8 caracteres
    if (password.length >= 8) {
        strength++;
    }

    // Contiene mayúsculas
    if (/[A-Z]/.test(password)) {
        strength++;
    }

    // Contiene minúsculas
    if (/[a-z]/.test(password)) {
        strength++;
    }

    // Contiene números
    if (/[0-9]/.test(password)) {
        strength++;
    }

    // Contiene caracteres especiales
    if (/[\W_]/.test(password)) {
        strength++;
    }

    // Ajusta la barra de fortaleza de contraseña
    let width;
    let backgroundColor;
    switch (strength) {
        case 0:
        case 1:
            width = '20%';
            backgroundColor = 'red';
            break;
        case 2:
            width = '40%';
            backgroundColor = 'orange';
            break;
        case 3:
            width = '60%';
            backgroundColor = 'yellow';
            break;
        case 4:
            width = '80%';
            backgroundColor = 'lightgreen';
            break;
        case 5:
            width = '100%';
            backgroundColor = 'green';
            break;
    }
    
    // Ajustar los estilos de la barra de fortaleza
    strengthBar.css({
        width: width,
        backgroundColor: backgroundColor
    });
}

