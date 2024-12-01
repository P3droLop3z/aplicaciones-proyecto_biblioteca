<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros Disponibles - Usuario</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

        <!-- Tabla de Libros -->
        <div class="table-responsive shadow-sm">
            <table class="table table-hover align-middle">
                <thead class="table-warning">
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Año de Publicación</th>
                        <th>Categoría</th>
                        <th>Copias Disponibles</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="title">Cien Años de Soledad</td>
                        <td id="autor">Pepe</td>
                        <td id="year">1967</td>
                        <td id="genre">Ficción</td>
                        <td id="copies">5</td>
                        <td>
                            <button class="btn btn-primary btn-sm" id="loan">Pedir Préstamo</button>
                            <button class="btn btn-secondary btn-sm" id="reserve">Reservar</button>
                        </td>
                    </tr>
                    <tr>
                        <td id="title">1984</td>
                        <td id="autor">Tilín</td>
                        <td id="year">1949</td>
                        <td id="genre">Distopía</td>
                        <td id="copies">0</td>
                        <td>
                            <button class="btn btn-primary btn-sm" id="loan" disabled>Pedir Préstamo</button>
                            <button class="btn btn-secondary btn-sm" id="reserve">Reservar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
