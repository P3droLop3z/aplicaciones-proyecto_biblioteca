document.addEventListener('DOMContentLoaded', function () {
    // Elemento de la tabla donde se mostrarán las reservas
    const reservasTable = document.getElementById('tablaReservas'); // ID del <tbody> de la tabla

    // Función para cargar las reservas
    function cargarReservas() {
        fetch('../../../BackEnd/model/getReservas.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Limpiar la tabla antes de agregar nuevos datos
                    reservasTable.innerHTML = '';

                    // Recorrer las reservas y agregarlas a la tabla
                    data.reservas.forEach(reserva => {
                        // Crear una fila para cada reserva
                        const row = document.createElement('tr');
                        
                        row.innerHTML = `
                            <td>${reserva.Titulo}</td>
                            <td>${reserva.FechaRes}</td>
                            <td>${reserva.FechaLim}</td>
                            <td>${reserva.Estado}</td>
                            <td>
                                <button class="btn btn-success btn-sm" onclick="confirmarReserva(${reserva.ReservaID})">Confirmar</button>
                                <button class="btn btn-danger btn-sm" onclick="cancelarReserva(${reserva.ReservaID})">Cancelar</button>
                            </td>
                        `;

                        // Añadir la fila a la tabla
                        reservasTable.appendChild(row);
                    });
                } else {
                    // Si no hay reservas, mostrar un mensaje
                    reservasTable.innerHTML = '<tr><td colspan="5" class="text-center">No hay reservas.</td></tr>';
                }
            })
            .catch(error => console.error('Error al cargar las reservas:', error));
    }

    // Cargar las reservas cuando la página esté lista
    cargarReservas();
});

// Funciones para confirmar y cancelar reservas
function confirmarReserva(reservaID) {
    // Aquí iría el código para confirmar la reserva
    console.log('Confirmar reserva ID:', reservaID);
}

function cancelarReserva(reservaID) {
    // Aquí iría el código para cancelar la reserva
    console.log('Cancelar reserva ID:', reservaID);
}
