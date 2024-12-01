<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas - Usuario</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./../css/reservation.css">
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
            <h1 class="section-title">Mis Reservas</h1>
            <p class="text-muted">Consulta tus reservas actuales y haz nuevas reservas.</p>
        </div>

        <!-- Formulario para Reservar un Libro -->
        <div class="mb-5">
            <h2 class="text-muted mb-3">Reservar un Libro</h2>
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="titulo" class="form-label">Título del Libro</label>
                    <input type="text" id="titulo" class="form-control" placeholder="Escribe el título del libro" required>
                </div>
                <div class="col-md-6">
                    <label for="autor" class="form-label">Autor</label>
                    <input type="text" id="autor" class="form-control" placeholder="Nombre del autor" required>
                </div>
                <div class="col-md-12">
                    <label for="fechaReserva" class="form-label">Fecha de Reserva</label>
                    <input type="date" id="fechaReserva" class="form-control" required>
                </div>
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-primary">Reservar</button>
                </div>
            </form>
        </div>

        <!-- Tabla de Reservas -->
        <div class="table-responsive shadow-sm">
            <h2 class="text-muted mb-3">Reservas Actuales</h2>
            <table class="table table-hover align-middle">
                <thead class="table-warning">
                    <tr>
                        <th>ID</th>
                        <th>Libro</th>
                        <th>Autor</th>
                        <th>Fecha de Reserva</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaReservas">
                    <tr>
                        <td>1</td>
                        <td>Cien Años de Soledad</td>
                        <td>Gabriel García Márquez</td>
                        <td>2024-11-10</td>
                        <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                        <td><button class="btn btn-danger btn-sm">Cancelar</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1984</td>
                        <td>George Orwell</td>
                        <td>2024-11-05</td>
                        <td><span class="badge bg-success">Confirmada</span></td>
                        <td><button class="btn btn-danger btn-sm">Cancelar</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
