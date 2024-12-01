<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Préstamos - Administrador</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./../css/loans.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="./menu.php">Biblioteca Administrador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./menu.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./users.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./books.php">Libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./loan.php">Préstamos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./reservation.php">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./ticket.php">Multas</a>
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
    <div class="container my-5">
        <!-- Título -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="section-title">Gestión de Préstamos</h1>
        </div>

        <!-- Tabla de Préstamos -->
        <div class="table-responsive shadow-sm">
            <table class="table table-hover align-middle">
                <thead class="table-warning">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Libro</th>
                        <th>Fecha de Préstamo</th>
                        <th>Fecha de Devolución</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaPrestamos">
                    <!-- Los datos serán generados dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
