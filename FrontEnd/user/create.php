<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/create.css">
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="register-container col-11 col-sm-8 col-md-6 col-lg-4 text-center">
            <!-- Apartado para el logo -->
            <img src="../assets/logo.png" alt="Logo de la Biblioteca" class="logo">

            <div class="mb-4">
                <h3>Crea una nueva cuenta</h3>
            </div>
            <form action="./../../BackEnd/controller/registerUserHandler.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" name="firstName" id="name" placeholder="Ingresa tu nombre" class="form-control">
                </div>
                <!-- Last Name -->
                <div class="mb-3">
                    <label for="lastName" class="form-label">Apellido:</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Tu apellido" required>
                </div>
                <!-- Telefono -->
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="text" name="tele" id="telefono" class="form-control" placeholder="Telefono" required>
                </div>
                <!-- Direccion -->
                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <input type="text" name="dire" id="direccion" class="form-control" placeholder="Direccion" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico*</label>
                    <input type="email" name="email" id="email" placeholder="Ingresa tu correo electrónico" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña*</label>
                    <input type="password" name="pass" id="password" placeholder="Ingresa tu contraseña" class="form-control">
                    <small class="text-muted">Debe contener al menos 8 caracteres</small>
                </div>
                <div class="d-grid">
                    <button type="submit" id="btnRegister" class="btn btn-primary btn-lg">Crear Cuenta</button>
                </div>
            </form>
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger mt-3" role="alert">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success mt-3" role="alert">
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </div>
            <?php endif; ?>
            <div class="text-center mt-3">
                <span>¿Ya tienes una cuenta? </span>
                <a href="main.html" class="texto-enlace">Inicia sesión</a>
            </div>
        </div>
    </div>
</body>
</html>
