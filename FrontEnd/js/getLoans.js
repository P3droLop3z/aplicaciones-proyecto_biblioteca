document.addEventListener('DOMContentLoaded', function () {
    const tableBody = document.getElementById('tablaPrestamos'); // Elemento donde se pintarán los datos

    // Hacer una solicitud al backend para obtener los datos de los préstamos
    fetch('../../../BackEnd/controller/getAllLoans.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                tableBody.innerHTML = ''; // Limpiar la tabla antes de agregar nuevos datos

                // Iterar sobre los préstamos y agregarlos a la tabla
                data.prestamos.forEach(prestamo => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${prestamo.PrestamoID}</td>
                        <td>${prestamo.Usuario}</td>
                        <td>${prestamo.Libro}</td>
                        <td>${prestamo.FechaPres}</td>
                        <td>${prestamo.FechaDev}</td>
                        <td>${prestamo.FechaLim}</td>
                        <td>${prestamo.Estado}</td>
                        <td><button class="btn btn-sm" onclick="devolverPrestamo(${prestamo.PrestamoID})">Devolver</button></td>
                    `;
                    tableBody.appendChild(row);
                });
            } else {
                tableBody.innerHTML = '<tr><td colspan="5" class="text-center">No hay préstamos disponibles.</td></tr>';
            }
        })
        .catch(error => console.error('Error al cargar los préstamos:', error));
});

