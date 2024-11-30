<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamos - Administrador</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./../css/books.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="./menu.html">Biblioteca Administrador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./menu.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./users.html">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./books.html">Libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./loan.html">Préstamos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./reservation.html">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./ticket.html">Multas</a>
                    </li>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link text-white" title="Ajustes">
                                    <span class="material-icons">settings</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./../../main.html" class="nav-link text-white" title="Cerrar sesión">
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
    <div class="container my-5">
        <!-- Gestión de Libros -->
        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="section-title">Gestión de Libros</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BookModal">Agregar Libro</button>
            </div>
            <div class="table-responsive shadow-sm">
                <table class="table table-hover align-middle">
                    <thead class="table-warning">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaLibros"></tbody>
                </table>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="BookModal" tabindex="-1" aria-labelledby="BookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="BookModalLabel">Nuevo Libro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título del Libro</label>
                            <input type="text" id="titulo" class="form-control" placeholder="Título del libro" required>
                        </div>
                        <div class="mb-3">
                            <label for="autor" class="form-label">Autor</label>
                            <input type="text" id="autor" class="form-control" placeholder="Nombre del autor" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" id="cantidad" class="form-control" placeholder="Cantidad de ejemplares" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Agregar Libro</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
