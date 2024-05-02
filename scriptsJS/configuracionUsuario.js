async function continuarDatos() {
    let sexo = $("#sexo").val();
    let edad = $("#edad").val();
    let estatura = $("#estatura").val();
    let peso = $("#peso").val();
    let tipoActividad = $("#actividad").val();
    let objetivo = $("#objetivo").val();

    if(sexo == "-1") {
        Swal.fire({
            title: "Error",
            position: "top-end",
            text: "Seleccione su sexo",
            icon: "error",
            showConfirmButton: false,
            timerProgressBar: true,
            timer: 1800
        });
        return;
    }

    if(edad <= "0" || estatura <= "0" || peso <= "0") {
        Swal.fire({
            title: "Error",
            position: "top-end",
            text: "Ingrese un valor valido",
            icon: "error",
            showConfirmButton: false,
            timerProgressBar: true,
            timer: 1800
        });
        return;
    }

    if(tipoActividad == "-1") {
        Swal.fire({
            title: "Error",
            position: "top-end",
            text: "Seleccione un tipo de actividad",
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
        }, 500);
    }) 

    $.ajax({
        type: 'POST',
        url: 'scriptsPHP/scriptActualizarConfi.php',
        dataType: "json",
        data: { 
            sexo : sexo, 
            edad : edad,
            estatura : estatura,
            peso : peso,
            tipoActividad : tipoActividad,
            objetivo : objetivo
        },
        success: function(data) {
            if(data.status == 'success') {
                Swal.fire({
                    title: "Exito",
                    position: "center",
                    text: "Datos guardados correctamente",
                    icon: "success",
                    showConfirmButton: true,
                }).then(() => {
                    window.location.href = 'inicio.php';
                })
                return;
            } 
            if(data.status == 'error')  {
                console.log("Da error");
                Swal.fire({
                    title: "Error",
                    position: "top-end",
                    text: "Error al guardar. Inténtalo de nuevo",
                    icon: "error",
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 1800
                });
            }
        },
        fail: function(jqXHR, textStatus, errorThrown) {
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