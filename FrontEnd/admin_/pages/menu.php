<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Administrador</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./../css/menua.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="./menu.php">Biblioteca Administrador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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
        </div>
    </nav>
    
    <header class="py-5 text-center text-white">
        <div class="container">
            <h1 class="bla">Bienvenido, Administrador</h1>
            <p class="lead">Gestiona la biblioteca desde este panel principal</p>
        </div>
    </header>

    <main class="container my-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-dashboard">
                    <div class="card-body text-center">
                        <span class="material-icons icon-dashboard">group</span>
                        <h5>Usuarios</h5>
                        <p>Gestiona los usuarios registrados en el sistema.</p>
                        <a href="./users.php" class="btn btn-primary">Ver Usuarios</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard">
                    <div class="card-body text-center">
                        <span class="material-icons icon-dashboard">book</span>
                        <h5>Libros</h5>
                        <p>Administra los libros disponibles en la biblioteca.</p>
                        <a href="./books.php" class="btn btn-primary">Ver Libros</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard">
                    <div class="card-body text-center">
                        <span class="material-icons icon-dashboard">assignment</span>
                        <h5>Préstamos</h5>
                        <p>Gestiona los préstamos realizados por los usuarios.</p>
                        <a href="./loan.php" class="btn btn-primary">Ver Préstamos</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="card card-dashboard">
                    <div class="card-body text-center">
                        <span class="material-icons icon-dashboard">bookmark</span>
                        <h5>Reservas</h5>
                        <p>Administra las reservas realizadas por los usuarios.</p>
                        <a href="./reservation.php" class="btn btn-primary">Ver Reservas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard">
                    <div class="card-body text-center">
                        <span class="material-icons icon-dashboard">money</span>
                        <h5>Multas</h5>
                        <p>Gestiona las multas pendientes de los usuarios.</p>
                        <a href="./ticket.php" class="btn btn-primary">Ver Multas</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center py-3">
        <p class="text-muted">&copy; 2024 Biblioteca Digital. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-k5Mzrx3ij4U1s8KfNxknslJ4+ZOm+zRx/8f7a4gJmgJ7xs1dt2e0dtnWITaeUtF6" crossorigin="anonymous"></script>
</body>
</html>
