$(document).ready(function() {
    setTimeout(() => {
        obtenerProductos();
    }, 500);

    // Agregar evento clic para el botón "Agregar al carrito"
    $('#productos-grid').on('click', '#boton', function() {
        var productoDiv = $(this).closest('.producto');
        var index = productoDiv.index(); // Obtener el índice del producto en la lista
        var cantidad = productoDiv.find('input[type="number"]').val(); // Obtener la cantidad del input
        var tipo = productoDiv.find('.producto-info p:eq(0)').text().replace('Tipo: ', ''); // Obtener el tipo del producto
        var imagen = productoDiv.find('img').attr('src'); // Obtener la URL de la imagen
        var nombre = productoDiv.find('.producto-info p:eq(1)').text().replace('Nombre: ', ''); // Obtener el nombre del producto
        var tamaño = productoDiv.find('.producto-info p:eq(2)').text().replace('Tamaño(g): ', ''); // Obtener el tamaño del producto
        var precio = productoDiv.find('.producto-info p:eq(3)').text().replace('Precio: ', ''); // Obtener el precio del producto

        // Enviar los detalles del producto al servidor para agregar al carrito
        agregarAlCarrito(index, cantidad, tipo, imagen, nombre, tamaño, precio);
    });
});

function agregarAlCarrito(index, cantidad, tipo, imagen, nombre, tamaño, precio) {
    $.ajax({
        url: 'scriptsPHP/carrito.php', // Ruta del script que maneja la adición al carrito
        type: 'POST',
        dataType: "json",
        data: { 
            index: index,
            cantidad: cantidad,
            tipo: tipo,
            imagen: imagen,
            nombre: nombre,
            tamaño: tamaño,
            precio: precio
        },
        success: function(response) {
            if (response.success) {
                // Éxito al agregar al carrito
                alert('Producto agregado al carrito correctamente.');
            } else {
                // Error al agregar al carrito
                alert('Error al agregar producto al carrito.');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error al agregar al carrito. ", errorThrown);
        }
    });
}

function obtenerProductos() {




    $.ajax({
        url: 'scriptsPHP/productos.php',
        type: 'POST',
        dataType: "json",
        data: { 
            // Puedes enviar cualquier dato adicional necesario aquí
        },
        success: function(data) {
            data.forEach((producto, index) => {
                // Crear un div para cada producto
                var productoDiv = $('<div class="producto"></div>');

                // Agregar imagen si existe URL válida
                if (producto.imagen && producto.imagen.trim() !== '') {
                    productoDiv.append(`<img src="${producto.imagen}" alt="${producto.nombre}">`);
                } else {
                    // Si no hay URL de imagen, mostrar un mensaje de "No image"
                    productoDiv.append('<p style="color: black">No image</p>');
                }

                // Agregar información del producto
                var infoDiv = $('<div class="producto-info"></div>');
                infoDiv.append(`<p>Tipo: ${producto.tipo}</p>`);
                infoDiv.append(`<p>Nombre: ${producto.nombre}</p>`);
                infoDiv.append(`<p>Tamaño(g): ${producto.tamaño}</p>`);
                infoDiv.append(`<p>Precio: ${producto.precio}</p>`);
                infoDiv.append(`<p>Stock: ${producto.stock}</p>`);
                infoDiv.append(`<label>Cantidad: </label><input type="number" min="0" max="${producto.stock}" value="0" style="width: 60px; float:right;" />`);
                infoDiv.append(`<hr>`);
                infoDiv.append(`<button type="button" class="ejemplo" id="boton">Agregar al carrito</button>`);
                
                // Añadir información al div de producto
                productoDiv.append(infoDiv);

                // Añadir productoDiv al contenedor de la cuadrícula
                $('#productos-grid').append(productoDiv);
            });

        },
        fail: function(jqXHR, textStatus, errorThrown) {
            console.log("Error al cargar los datos. ", errorThrown);
        }
    });
}
