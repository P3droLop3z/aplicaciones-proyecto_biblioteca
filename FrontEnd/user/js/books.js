document.addEventListener('DOMContentLoaded', function () {
    const booksContainer = document.getElementById('booksContainer');

    // Función para cargar los libros
    function loadBooks() {
        fetch('../../../BackEnd/controller/getBooks.php')
            .then(response => response.json())
            .then(books => {
                books.forEach(book => {
                    const card = document.createElement('div');
                    card.classList.add('col');
                    card.innerHTML = `
                        <div class="card h-100">
                            <img src="https://maremagnum-distribution-point-prod.ams3.cdn.digitaloceanspaces.com/maremagnum/static/sito/img/libri-moderni-placeholder.png" class="card-img-top" alt="Imagen del libro">
                            <div class="card-body">
                                <h5 class="card-title text-warning">${book.Titulo}</h5>
                                <p class="card-text"><strong>Autor:</strong> ${book.Autor}</p>
                                <button class="btn btn-primary btn-sm" data-id="${book.LibroID}" onclick="showBookDetails(${book.LibroID})">Ver Detalles</button>
                            </div>
                        </div>`;
                    booksContainer.appendChild(card);
                });
            })
            .catch(error => console.error('Error al cargar los libros:', error));
    }

    // Función para mostrar los detalles del libro
    window.showBookDetails = function (bookId) {
        fetch(`../../../BackEnd/controller/getBookDetails.php?id=${bookId}`)
            .then(response => response.json())
            .then(book => {
                document.getElementById('BookTitle').textContent = book.Titulo;
                document.getElementById('BookYear').textContent = book.Apublicacion;
                document.getElementById('BookAuthor').textContent = book.Autor;
                document.getElementById('BookCategory').textContent = book.CategoryName;
                document.getElementById('BookCopies').textContent = book.Copias;
                //document.getElementById('bookAvailableCopies').textContent = book.numeroCopias;  
                const bookModal = new bootstrap.Modal(document.getElementById('bookModal'));
                bookModal.show();
            })
            .catch(error => console.error('Error al cargar los detalles del libro:', error));
    };

    // Cargar los libros al iniciar
    loadBooks();
});
