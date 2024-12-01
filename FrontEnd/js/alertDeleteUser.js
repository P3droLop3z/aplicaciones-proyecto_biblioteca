document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.deleteBtn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Evitar redirección automática

            const userId = this.getAttribute('data-id'); // Obtener el ID del usuario
            const confirmDelete = confirm('¿Estás seguro de que deseas eliminar a este usuario?');

            if (confirmDelete) {
                // Redirigir al archivo PHP para eliminar
                window.location.href = `../../../BackEnd/routes/deleteUser.php?id=${userId}`;
            }
        });
    });
});
