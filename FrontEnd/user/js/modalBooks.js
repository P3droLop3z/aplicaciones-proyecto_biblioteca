document.addEventListener('DOMContentLoaded', function () {
    const bookModal = document.getElementById('bookModal');
    
    let bookID = null

    bookModal.addEventListener('show.bs.modal', function (event) {
        // Obtener el bookID desde el atributo data
        const bookID = event.relatedTarget.getAttribute('data-book-id');

        // Hacer una solicitud AJAX para obtener los detalles del libro
        fetch(`../../../BackEnd/model/cardBookDetails.php?bookID=${bookID}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    // Llenar el modal con los detalles del libro
                    document.getElementById('BookTitle').textContent = data.Titulo;
                    document.getElementById('BookAuthor').textContent = `${data.FirstName} ${data.LastName}`;
                    document.getElementById('BookYear').textContent = data.Apublicacion;
                    document.getElementById('BookCategory').textContent = data.CategoryName;
                    document.getElementById('BookCopies').textContent = data.Copias;
                }
            })
            .catch(error => console.error('Error al cargar los detalles del libro:', error));
    });

    // Evento al hacer clic en "Pedir Préstamo"
    const borrowBookBtn = document.getElementById('prestBookBtn');
    if (borrowBookBtn) {
        borrowBookBtn.addEventListener('click', function () {
            if (bookID) {
                // Obtener la fecha actual
                const currentDate = new Date();
                const dueDate = new Date(currentDate);
                dueDate.setDate(dueDate.getDate() + 7); // Sumar 7 días a la fecha actual

                // Formatear las fechas en formato 'YYYY-MM-DD'
                const formattedCurrentDate = currentDate.toISOString().split('T')[0];
                const formattedDueDate = dueDate.toISOString().split('T')[0];

                // Enviar la solicitud para registrar el préstamo
                fetch('../../../BackEnd/model/prestamo.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        bookId: bookId,
                        loanDate: formattedCurrentDate,
                        dueDate: formattedDueDate,
                        status: 'Pendiente', // Estado predeterminado
                        userId: 16
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Préstamo realizado con éxito');
                        // Cerrar el modal después de realizar el préstamo
                        $('#bookModal').modal('hide');
                    } else {
                        alert('Error al realizar el préstamo');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    }
});

