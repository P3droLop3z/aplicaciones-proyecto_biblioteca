document.addEventListener('DOMContentLoaded', function () {
    const addUserForm = document.getElementById('addUserForm');

    addUserForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Evitar la recarga de la página

        // Obtener los datos del formulario
        const firstName = document.getElementById('addFirstName').value;
        const lastName = document.getElementById('addLastName').value;
        const email = document.getElementById('addEmail').value;
        const passw = document.getElementById('addPass').value;
        const telefono = document.getElementById('addTelefono').value;
        const direccion = document.getElementById('addDireccion').value;

        // Enviar los datos al backend
        fetch('../../../BackEnd/routes/addUser.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ firstName, lastName, email, passw, telefono, direccion })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Recargar la página para reflejar los cambios en la tabla
                location.reload();
            } else {
                alert('Error al agregar el usuario');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
