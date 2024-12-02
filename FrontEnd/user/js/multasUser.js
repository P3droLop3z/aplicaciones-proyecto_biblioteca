document.addEventListener('DOMContentLoaded', function () {
    // Elemento de la tabla donde se mostrarán las multas
    const multasTable = document.getElementById('tablaMultas'); // ID del <tbody> de la tabla

    // Función para cargar las multas
    function cargarMultas() {
        fetch('../../../BackEnd/model/getMultas.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Limpiar la tabla antes de agregar nuevos datos
                    multasTable.innerHTML = '';

                    // Recorrer las multas y agregarlas a la tabla
                    data.multas.forEach(multa => {
                        // Crear una fila para cada multa
                        const row = document.createElement('tr');
                        
                        row.innerHTML = `
                            <td>${multa.Libro}</td>
                            <td>${multa.Monto}</td>
                            <td>${multa.FechaEmision}</td>
                            <td>${multa.Estado}</td>
                            <td>
                                <button class="btn btn-success btn-sm" onclick="pagarMulta(${multa.MultaID})">Pagar</button>
                            </td>
                        `;

                        // Añadir la fila a la tabla
                        multasTable.appendChild(row);
                    });
                } else {
                    // Si no hay multas, mostrar un mensaje
                    multasTable.innerHTML = '<tr><td colspan="6" class="text-center">No hay multas registradas.</td></tr>';
                }
            })
            .catch(error => console.error('Error al cargar las multas:', error));
    }

    // Cargar las multas cuando la página esté lista
    cargarMultas();
});

// Funciones para pagar y anular multas
function pagarMulta(multaID) {
    // Aquí iría el código para pagar la multa (puedes actualizar su estado en la base de datos)
    console.log('Pagar multa ID:', multaID);
}

