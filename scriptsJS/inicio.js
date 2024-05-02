$(document).ready(function() {
    let diaSemana = $("#dia");

    let fechaActual = new Date();
    let dia = fechaActual.getDate();
    let año = fechaActual.getFullYear();
    let mes = fechaActual.getMonth();
    let nombresMeses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    let nombreMes = nombresMeses[mes];
    
    let label = "Hoy es " + dia + " de " + nombreMes + " del año " + año;
    diaSemana.text(label);

    recibirDatos();
});

function recibirDatos() {
    $.ajax({
        url: 'scriptsPHP/calcularCalorias.php',
        type: 'POST', 
        dataType: 'json',
        data: {
            
        },
        success: function(data) {
            console.log(data);
            data.forEach(elemento => {

                let edad = parseInt(elemento.edad);
                let sexo = elemento.sexo;
                let actividad = elemento.tipoactividad;
                let estatura = parseFloat(elemento.estatura);
                let peso = parseFloat(elemento.peso);
                let objetivo = elemento.objetivo;

                console.log(objetivo);

                // Calcular calorias de mantenimiento
                function mantenimiento(){
                    let actividadTEMPP
                    switch (actividad) {
                        case "poco activo":
                                 actividadTEMPP = 1.2;
                                 console.log(actividadTEMPP);
                            break;
                        case "moderado":
                            actividadTEMPP = 1.55;
                            console.log(actividadTEMPP);

                            break;
                        case "activo":
                            actividadTEMPP = 1.725;
                            console.log(actividadTEMPP);

                            break;
                        case "muy activo":
                            actividadTEMPP = 1.9;
                            console.log(actividadTEMPP);

                            break; 
                        default:
                            console.log("No hay valores en la variable actividadTEMPP");
                            break;
                    }

                    let tasaMetabolicaBasal;
                    if (sexo == "Mujer") {
                        tasaMetabolicaBasal = 447.593 + (9.247 * peso) + (3.098 * estatura) - (4.330 * edad);
                    } else if (sexo == "Hombre") {
                        tasaMetabolicaBasal = 88.362 + (13.397 * peso) + (4.799 * estatura) - (5.677 * edad);
                    }

                    // Multiplicar la tasa metabólica basal por el nivel de actividad física
                    var caloriasMantenimiento = tasaMetabolicaBasal * actividadTEMPP;
                    let carbohidratos,carbosFinal;
                    let proteinas,proteinasFinal;
                    let grasas,grasasFinal;

                    switch (objetivo) {
                        case "bajar":
                             caloriasMantenimiento = caloriasMantenimiento - 500;

                            // Calcular los macronutrientes de mantenimiento
                            // Carbohidratos
                            carbohidratos = caloriasMantenimiento * 0.55;
                            carbosFinal = carbohidratos / 4;

                           // Proteinas
                               proteinas = caloriasMantenimiento * 0.12;
                               proteinasFinal = proteinas / 4;

                           // Grasa
                               grasas = caloriasMantenimiento * 0.35;
                               grasasFinal = grasas / 9;
                            break;
                            
                        case "subir":
                            
                             caloriasMantenimiento = caloriasMantenimiento + 500;

                            // Calcular los macronutrientes de mantenimiento
                            // Carbohidratos
                            carbohidratos = caloriasMantenimiento * 0.55;
                            carbosFinal = carbohidratos / 4;

                           // Proteinas
                               proteinas = caloriasMantenimiento * 0.12;
                               proteinasFinal = proteinas / 4;

                           // Grasa
                               grasas = caloriasMantenimiento * 0.35;
                               grasasFinal = grasas / 9;

                            break;

                        case "mantener":
                            // Calcular los macronutrientes de mantenimiento
                            // Carbohidratos
                             carbohidratos = caloriasMantenimiento * 0.55;
                             carbosFinal = carbohidratos / 4;

                            // Proteinas
                                proteinas = caloriasMantenimiento * 0.12;
                                proteinasFinal = proteinas / 4;

                            // Grasa
                                grasas = caloriasMantenimiento * 0.35;
                                grasasFinal = grasas / 9;
                         
                             break;
                        default:
                            console.log("no entro aqui");
                        break;
                    }

                      let resultadoCalorias = document.getElementById("calorias");
                      resultadoCalorias.textContent = parseFloat(caloriasMantenimiento).toFixed(0);

                      let carbos = document.getElementById("carbohidratos");
                      carbos.textContent = (`Carbohidratos: ${carbosFinal.toFixed(0)}`);

                      let prote = document.getElementById("proteinas");
                      prote.textContent = (`Proteinas: ${proteinasFinal.toFixed(0)}`);

                      let grasa = document.getElementById("grasas");
                      grasa.textContent = (`Grasas: ${grasasFinal.toFixed(0)}`);


                }

                mantenimiento();

                

            });

        },
        fail: function(jqXHR, textStatus, errorThrown) {
            console.log("Error al cargar los datos. ", errorThrown);
        }
    })
}