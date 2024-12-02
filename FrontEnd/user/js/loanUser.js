document.addEventListener('DOMContentLoaded', function() {
    // Realizar la solicitud AJAX para obtener los préstamos
    fetch('../../../BackEnd/model/consultasUsuario.php') // Ruta de tu archivo PHP
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                const tableBody = document.getElementById('tablaPrestamos');

                // Recorrer los préstamos y agregarlos a la tabla
                data.forEach(Prestamos => {
                    const row = document.createElement('tr');

                    const cell1 = document.createElement('td');
                    cell1.textContent = Prestamos.Titulo;
                    row.appendChild(cell1);

                    const cell2 = document.createElement('td');
                    cell2.textContent = Prestamos.FechaPres;
                    row.appendChild(cell2);

                    const cell3 = document.createElement('td');
                    cell3.textContent = Prestamos.FechaLim;
                    row.appendChild(cell3);

                    const cell4 = document.createElement('td');
                    cell4.textContent = Prestamos.Estado;
                    row.appendChild(cell4);

                    // Columna de acciones con el botón "Devolver"
                    const cell5 = document.createElement('td');
                    const devolverButton = document.createElement('button');
                    devolverButton.textContent = 'Devolver';
                    devolverButton.classList.add('btn', 'btn-danger'); // Estilo del botón
                    devolverButton.addEventListener('click', function() {
                        devolverPrestamo(Prestamos.PrestamoID);
                    });
                    cell5.appendChild(devolverButton);
                    row.appendChild(cell5);

                    // Agregar la fila al cuerpo de la tabla
                    tableBody.appendChild(row);
                });
            } else {
                alert("No tienes préstamos registrados.");
            }
        })
        .catch(error => console.error('Error al cargar los préstamos:', error));
});

// Función para devolver el préstamo
function devolverPrestamo(prestamoID) {
    const confirmacion = confirm("¿Estás seguro de que deseas devolver este libro?");
    if (confirmacion) {
        // Enviar la solicitud para devolver el préstamo
        fetch('../../../BackEnd/model/returnLoan.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ prestamoID: prestamoID })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("¡Préstamo devuelto con éxito!");
                location.reload(); // Recargar la página para ver el cambio
            } else {
                alert("Hubo un error al devolver el libro.");
            }
        })
        .catch(error => console.error('Error al devolver el préstamo:', error));
    }
}
