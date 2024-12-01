<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Usuario</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./../css/menuu.css">
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
                        <a class="nav-link text-white fw-semibold" href="./menu.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./loan.html">Mis Préstamos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./reservation.html">Mis Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="./ticket.html">Mis Multas</a>
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
    <div class="container mt-5">
        <!-- Banner -->
        <div class="banner text-white text-center">
            <h1>Bienvenido a la Biblioteca</h1>
            <p>Encuentra tu próximo libro favorito, revisa tus préstamos o paga tus multas desde aquí.</p>
        </div>

        <!-- Buscador -->
        <div class="search-bar text-center my-4">
            <div class="input-group input-group-lg">
                <input type="text" class="form-control" placeholder="Busca libros, autores, géneros...">
                <button class="btn btn-primary" type="button"><span class="material-icons">search</span></button>
            </div>
        </div>

        <!-- Libros Destacados -->
        <section>
            <h2 class="text-muted mb-4">Libros Destacados</h2>
            <div class="row g-4">
                <!-- Tarjeta de libro -->
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Libro 1">
                        <div class="card-body">
                            <h5 class="card-title">Título del Libro</h5>
                            <p class="card-text">Autor: Jane Doe</p>
                            <a href="#" class="btn btn-primary btn-sm">Ver Detalles</a>
                        </div>
                    </div>
                </div>
                <!-- Tarjeta adicional para más libros -->
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Libro 2">
                        <div class="card-body">
                            <h5 class="card-title">Título del Libro</h5>
                            <p class="card-text">Autor: John Smith</p>
                            <a href="#" class="btn btn-primary btn-sm">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Resumen de Actividad -->
        <section class="mt-5">
            <h2 class="text-muted mb-4">Resumen de tu Actividad</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <h5 class="card-title">Préstamos Activos</h5>
                            <p class="card-text fs-4">3</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <h5 class="card-title">Reservas Pendientes</h5>
                            <p class="card-text fs-4">2</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <h5 class="card-title">Multas Pendientes</h5>
                            <p class="card-text fs-4">$20</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>