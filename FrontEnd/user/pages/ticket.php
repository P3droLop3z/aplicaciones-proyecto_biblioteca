<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Multas - Usuario</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./../css/ticket.css">
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
            <h1 class="section-title">Mis Multas</h1>
            <p class="text-muted">Consulta y paga tus multas pendientes.</p>
        </div>

        <!-- Tabla de Multas -->
        <div class="table-responsive shadow-sm">
            <h2 class="text-muted mb-3">Multas Actuales</h2>
            <table class="table table-hover align-middle">
                <thead class="table-warning">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaMultas">
                    <tr>
                        <td>1</td>
                        <td>Devolución tardía</td>
                        <td>$10</td>
                        <td><span class="badge bg-danger">Pendiente</span></td>
                        <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pagarMultaModal">Pagar</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Libro dañado</td>
                        <td>$15</td>
                        <td><span class="badge bg-success">Pagada</span></td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para Pagar Multa -->
    <div class="modal fade" id="pagarMultaModal" tabindex="-1" aria-labelledby="pagarMultaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="pagarMultaModalLabel">Pagar Multa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas pagar esta multa?</p>
                    <p class="fw-bold">Monto: <span id="montoMulta">$10</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Pagar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
