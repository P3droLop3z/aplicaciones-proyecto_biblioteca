document.addEventListener('DOMContentLoaded', function () {
    const booksList = document.getElementById('booksList');
    const pagination = document.getElementById('pagination');

    // Función para cargar los libros de una página específica
    function loadBooks(page = 1) {
        fetch(`../../../BackEnd/controller/getAllBooks.php?page=${page}`)
            .then(response => response.json())
            .then(data => {
                const { books, totalBooks, perPage, currentPage } = data;

                // Vaciar el contenedor de libros y la paginación
                booksList.innerHTML = '';
                pagination.innerHTML = '';

                // Generar las cards horizontales para los libros
                books.forEach(book => {
                    const bookCard = document.createElement('div');
                    bookCard.innerHTML = `
                        <div class="book-card shadow-sm d-flex align-items-center" data-book-id="${book.LibroID}" data-bs-toggle="modal" data-bs-target="#bookModal">
                            <div class="book-image">
                                <div class="book-title">${book.Titulo}</div>
                            </div>
                            <div class="book-info px-4">
                                <p class="d-flex align-items-center">
                                    <span class="me-2 fw-bold">Año:</span>
                                    <span>${book.Apublicacion}</span>
                                </p>
                                <p class="d-flex align-items-center">
                                    <span class="me-2 fw-bold">Autor:</span>
                                    <span>${book.Autor}</span>
                                </p>
                                <p class="d-flex align-items-center">
                                    <span class="me-2 fw-bold">Categoría:</span>
                                    <span>${book.CategoryName}</span>
                                </p>
                            </div>
                        </div>
                        `;
                    booksList.appendChild(bookCard);
                });

                // Generar los botones de paginación
                const totalPages = Math.ceil(totalBooks / perPage);
                for (let i = 1; i <= totalPages; i++) {
                    const pageItem = document.createElement('li');
                    pageItem.classList.add('page-item');
                    if (i === currentPage) pageItem.classList.add('active');
                    pageItem.innerHTML = `
                        <button class="page-link" data-page="${i}">${i}</button>
                    `;
                    pagination.appendChild(pageItem);
                }

                // Agregar evento de clic a los botones de paginación
                const pageLinks = pagination.querySelectorAll('.page-link');
                pageLinks.forEach(link => {
                    link.addEventListener('click', function () {
                        const page = parseInt(this.getAttribute('data-page'));
                        loadBooks(page);
                    });
                });
            })
            .catch(error => console.error('Error al cargar los libros:', error));
    }

    // Cargar la primera página al iniciar
    loadBooks();
});
