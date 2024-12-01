// Seleccionar botones de editar libro
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.editBookBtn');
    const editBookForm = document.getElementById('editBookForm');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Obtener datos del libro desde los atributos data-*
            const bookId = this.getAttribute('data-id');
            const title = this.getAttribute('data-title');
            const author = this.getAttribute('data-author')
            const year = this.getAttribute('data-year');
            const category = this.getAttribute('data-category');
            const copies = this.getAttribute('data-copies');

            // Separar nombre y apellido del autor
            const [authorFN, authorLN] = author.split(' ');

            // Llenar el modal con los datos del libro
            document.getElementById('editBookId').value = bookId;
            document.getElementById('editBookTitle').value = title;
            document.getElementById('editautorFirstName').value = authorFN || '';
            document.getElementById('editautorLastName').value = authorLN || '';
            document.getElementById('editPublicationYear').value = year;
            document.getElementById('editCategory').value = category;
            document.getElementById('editCopies').value = copies;

            // Mostrar el modal
            const editBookModal = new bootstrap.Modal(document.getElementById('editBookModal'));
            editBookModal.show();
        });
    });

    // Manejar el envío del formulario de edición
    editBookForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevenir la recarga de la página

        const bookId = document.getElementById('editBookId').value;
        const title = document.getElementById('editBookTitle').value;
        const autorFN = document.getElementById('editautorFirstName').value
        const autorLN = document.getElementById('editautorLastName').value
        const year = document.getElementById('editPublicationYear').value;
        const category = document.getElementById('editCategory').value;
        const copies = document.getElementById('editCopies').value;

        fetch('../../../BackEnd/routes/editBook.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ bookId, title, autorFN, autorLN, year, category, copies })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Libro actualizado correctamente');
                location.reload(); // Recargar la página para reflejar los cambios
            } else {
                alert('Error al actualizar el libro');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});