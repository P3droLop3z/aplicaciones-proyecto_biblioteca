<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">

</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-container col-11 col-sm-8 col-md-6 col-lg-4 text-center">
            <!-- Apartado para el logo -->
            <img src="../assets/logo.png" alt="Logo de la Biblioteca" class="logo">


            <div class="mb-4">
                <h3>Inicia sesión</h3>
                <p class="text-muted">Bienvenido de nuevo</p>
            </div>
            <form action="./../../BackEnd/controller/validarUser.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" id="email" placeholder="Ingresa tu correo electrónico" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="pass" id="password" placeholder="Ingresa tu contraseña" class="form-control">
                </div>
                <div class="d-grid">
                    <button type="submit" id="btnLogin" class="btn btn-primary btn-lg">Iniciar Sesión</button>
                </div>
            </form>
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger mt-3" role="alert">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <div class="text-center mt-3">
                <span>¿No tienes una cuenta? </span>
                <a href="create.html" class="texto-enlace2">Crea una</a>
            </div>
        </div>
    </div>
</body>
</html>
