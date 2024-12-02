document.addEventListener('DOMContentLoaded', function () {
    const tableBody = document.getElementById('tablaReservas'); // Elemento donde se pintarán los datos

    // Hacer una solicitud al backend para obtener los datos de las reservas
    fetch('../../../BackEnd/controller/getAllReservas.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                tableBody.innerHTML = ''; // Limpiar la tabla antes de agregar nuevos datos

                // Iterar sobre las reservas y agregarlas a la tabla
                data.reservas.forEach(reserva => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${reserva.ReservaID}</td>
                        <td>${reserva.Usuario}</td>
                        <td>${reserva.Libro}</td>
                        <td>${reserva.FechaRes}</td>
                        <td>${reserva.FechaExp}</td>
                        <td>${reserva.Estado}</td>
                    `;
                    tableBody.appendChild(row);
                });
            } else {
                tableBody.innerHTML = '<tr><td colspan="7" class="text-center">No hay reservas disponibles.</td></tr>';
            }
        })
        .catch(error => console.error('Error al cargar las reservas:', error));
});
