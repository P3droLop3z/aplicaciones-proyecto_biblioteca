<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros Disponibles - Usuario</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./../css/books.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white fw-bold">Biblioteca Usuario</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./menu.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./books.php">Libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./loan.php">Mis Préstamos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./reservation.php">Mis Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./ticket.php">Mis Multas</a>
                    </li>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link text-white" title="Ajustes">
                                    <span class="material-icons">settings</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./../../main.php" class="nav-link text-white" title="Cerrar sesión">
                                    <span class="material-icons">logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <!-- Título -->
        <div class="text-center mb-5">
            <h1 class="section-title">Libros Disponibles</h1>
            <p class="text-muted">Consulta los libros disponibles en la biblioteca.</p>
        </div>
        <div class="row g-4" id="booksList">
            <div class="col-12">
                <!-- Las cards horizontales se generarán dinámicamente aquí -->
            </div>
        </div>
        
        <nav aria-label="Paginación de libros" class="mt-4">
            <ul id="pagination" class="pagination justify-content-center">
                <!-- Los botones de paginación se generarán dinámicamente aquí -->
            </ul>
        </nav>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="bookModalLabel">Detalles del Libro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalBookImage" src="./../../assets/Libro.png" alt="Libro" class="img-fluid mb-3" style="max-height: 200px;">
                    <p class="d-flex align-items-center">
                        <span class="me-2 fw-bold">Título:</span>
                        <span id="BookTitle"></span>
                    </p>
                    <p class="d-flex align-items-center">
                        <span class="me-2 fw-bold">Año:</span>
                        <span id="BookYear"></span>
                    </p>
                    <p class="d-flex align-items-center">
                        <span class="me-2 fw-bold">Autor:</span>
                        <span id="BookAuthor"></span>
                    </p>
                    <p class="d-flex align-items-center">
                        <span class="me-2 fw-bold">Categoría:</span>
                        <span id="BookCategory"></span>
                    </p>
                    <p class="d-flex align-items-center">
                        <span class="me-2 fw-bold">Copias Totales:</span>
                        <span id="BookCopies"></span>
                    </p>
                    <p class="d-flex align-items-center">
                        <span class="me-2 fw-bold">Copias Disponibles:</span>
                        <span id="BookAvailableCopies"></span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button id="prestBookBtn" type="button" class="btn btn-primary">Pedir Préstamo</button>
                    <button type="button" class="btn btn-secondary">Reservar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/bookPagination.js"></script>
    <script src="../js/modalBooks.js"></script>
</body>
</html>
