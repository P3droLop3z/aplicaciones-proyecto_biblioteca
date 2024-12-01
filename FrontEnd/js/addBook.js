document.addEventListener('DOMContentLoaded', function () {
    const addBookForm = document.getElementById('addBookForm');

    addBookForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Evitar recarga de la página

        // Obtener los datos del formulario
        const title = document.getElementById('titulo').value;
        const publicationYear = document.getElementById('publicationYear').value;
        const category = document.getElementById('categoryName').value;
        const authorFirstName = document.getElementById('autorFirstName').value;
        const authorLastName = document.getElementById('autorLastName').value;
        const copies = document.getElementById('cantidad').value;

        // Enviar los datos al backend
        fetch('../../../BackEnd/routes/addBook.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ title, authorFirstName, authorLastName, publicationYear, category, copies })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Recargar la página para mostrar el nuevo libro
                location.reload();
            } else {
                alert('Error al agregar el libro');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
