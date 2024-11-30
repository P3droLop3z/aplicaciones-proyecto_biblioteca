// Seleccionar botones de editar
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.editBtn');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Obtener los datos del usuario 
            const userId = this.getAttribute('data-id')
            const firstName = this.getAttribute('data-firstname')
            const lastName = this.getAttribute('data-lastname')
            const email = this.getAttribute('data-email')
            const telefono = this.getAttribute('data-telefono')
            const direccion = this.getAttribute('data-direccion')
            const estado = this.getAttribute('data-estado')

            // Cargar datos en el modal
            document.getElementById('editUserId').value = userId
            document.getElementById('editFirstName').value = firstName
            document.getElementById('editLastName').value = lastName
            document.getElementById('editEmail').value = email
            document.getElementById('editTelefono').value = telefono
            document.getElementById('editDireccion').value = direccion
            document.getElementById('editEstado').value = estado

            // Mostrar el modal
            const editUserModal = new bootstrap.Modal(document.getElementById('editUserModal'));
            editUserModal.show();
        });
    });
});

// Envio para actualizar los datos
document.getElementById('editUserForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Obtener los datos del formulario
    const userId = document.getElementById('editUserId').value;
    const firstName = document.getElementById('editFirstName').value;
    const lastName = document.getElementById('editLastName').value;
    const email = document.getElementById('editEmail').value;
    const telefono = document.getElementById('editTelefono').value;
    const direccion = document.getElementById('editDireccion').value;
    const estado = document.getElementById('editEstado').value;

    // Enviar los datos al backend mediante AJAX
    fetch('../../../BackEnd/routes/updateUser.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ userId, firstName, lastName, email, telefono, direccion, estado })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Actualizar la tabla sin recargar
            const row = document.querySelector(`button[data-id="${userId}"]`).closest('tr');
            row.children[1].textContent = `${firstName} ${lastName}`;
            row.children[2].textContent = email;
            row.children[3].textContent = telefono;
            row.children[4].textContent = direccion; 
            row.children[5].textContent = estado;

            // Cerrar el modal
            const editUserModal = bootstrap.Modal.getInstance(document.getElementById('editUserModal'));
            editUserModal.hide();
        } else {
            alert('Error al actualizar el usuario');
        }
    })
    .catch(error => console.error('Error:', error));
});
