<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Administrador</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 30rem;">
            <h2 class="text-center mb-4">Registro de Administrador</h2>
            <form action="../controller/registerAdminHandler.php" method="POST">
                <!-- First Name -->
                <div class="mb-3">
                    <label for="firstName" class="form-label">Nombre:</label>
                    <input type="text" name="data-firstName" id="firstName" class="form-control" placeholder="Tu nombre" required>
                </div>
                <!-- Last Name -->
                <div class="mb-3">
                    <label for="lastName" class="form-label">Apellido:</label>
                    <input type="text" name="data-lastName" id="lastName" class="form-control" placeholder="Tu apellido" required>
                </div>
                <!-- Telefono -->
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" required>
                </div>
                <!-- Direccion -->
                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" required>
                </div>
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="admin@example.com" required>
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Crea una contraseña" required>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Registrar</button>
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
        </div>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
