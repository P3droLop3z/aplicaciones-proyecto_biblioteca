document.addEventListener('DOMContentLoaded', function () {
    const tableBody = document.getElementById('tablaMultas'); // Elemento donde se pintarán los datos

    // Hacer una solicitud al backend para obtener los datos de las multas
    fetch('../../../BackEnd/controller/getAllTickets.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                tableBody.innerHTML = ''; // Limpiar la tabla antes de agregar nuevos datos

                // Iterar sobre las multas y agregarlas a la tabla
                data.multas.forEach(multa => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${multa.MultaID}</td>
                        <td>${multa.Usuario}</td>
                        <td>${multa.Libro}</td>
                        <td>${multa.Monto}</td>
                        <td>${multa.FechaEmision}</td>
                        <td>${multa.Estado}</td>
                    `;
                    tableBody.appendChild(row);
                });
            } else {
                tableBody.innerHTML = '<tr><td colspan="7" class="text-center">No hay multas disponibles.</td></tr>';
            }
        })
        .catch(error => console.error('Error al cargar las multas:', error));
});
