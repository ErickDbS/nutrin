function desbloquearContraseñas() {
    let checkbox = $('input:checkbox[name="checkbox"]');

    if (checkbox.is(':checked')) {
        $('#contraUsuario').show();
        limpiarContraseñas();
    } else {
        $('#contraUsuario').hide();
        limpiarContraseñas();
    }
}

function limpiarContraseñas() {
    $("#contraseñaNueva").val("");
    $("#confirmarContraseña").val("");
    $("#contraseñasCoinciden").text("").css("color", "initial");
    $("#cambiarContraseña").attr("disabled", true);
}

function validarContraseña() {
    const nuevaContraseña = $("#contraseñaNueva").val();
    const confirmarContraseña = $("#confirmarContraseña").val();
    const contraseñasCoinciden = $("#contraseñasCoinciden");
    
    // Verificar si ambas contraseñas coinciden
    if (nuevaContraseña === confirmarContraseña) {
        contraseñasCoinciden.text("Las contraseñas coinciden");
        contraseñasCoinciden.css("color", "green");
        $("#cambiarContraseña").attr("disabled", false);
    } else {
        contraseñasCoinciden.text("Las contraseñas no coinciden");
        contraseñasCoinciden.css("color", "red");
        $("#cambiarContraseña").attr("disabled", true);
    }
}

function desbloquearTelefono() {
    let checkbox = $('input:checkbox[name="checkbox"]');

    if (checkbox.is(':checked')) {
        $('#numeroTelefono').show();
        limpiarContraseñas();
    } else {
        $('#numeroTelefono').hide();
        limpiarContraseñas();
    }
}
