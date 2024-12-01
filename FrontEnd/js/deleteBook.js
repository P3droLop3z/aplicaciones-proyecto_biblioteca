document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.deleteBookBtn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Prevenir el comportamiento por defecto del enlace

            const bookId = this.getAttribute('data-id'); // Obtener el ID del libro
            const confirmDelete = confirm('¿Estás seguro de que deseas eliminar este libro?');

            if (confirmDelete) {
                // Enviar solicitud al backend
                fetch(`../../../BackEnd/routes/deleteBook.php?id=${bookId}`, {
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Libro eliminado correctamente');
                        location.reload(); // Recargar la página para reflejar los cambios
                    } else {
                        alert('Error al eliminar el libro');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
});
