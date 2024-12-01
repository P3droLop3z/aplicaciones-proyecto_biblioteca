<?php
require_once '../../../BackEnd/config/config.php';
if (!$conn) {
    die('Error: La conexión no se estableció correctamente.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Administrador</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./../css/users.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Administrar Usuarios</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: #ffc107;">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="./menu.php">Biblioteca Administrador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="./menu.php" style="text-decoration: none;">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="./users.php" style="text-decoration: none;">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="./books.php" style="text-decoration: none;">Libros</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="./loan.php" style="text-decoration: none;">Préstamos</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="./reservation.php" style="text-decoration: none;">Reservas</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="./ticket.php" style="text-decoration: none;">Multas</a></li>
                    <li class="nav-item d-flex align-items-center ms-3 menu-item">
                        <a href="#" class="text-white d-flex align-items-center justify-content-center" style="font-size: 24px; text-decoration: none;">
                            <span class="material-icons">settings</span>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center ms-3 log-button">
                        <a href="./../../main.php" class="text-white d-flex align-items-center justify-content-center" style="font-size: 24px; text-decoration: none;">
                            <span class="material-icons">logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container container-menu mt-4">
        <!-- Usuarios Comunes -->
        <div class="table-container">
            <div class="d-flex gap-5 mb-2">
                <h2 class="text-muted">Usuarios Comunes Registrados</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UserModal">Dar de Alta</button>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="usuariosComunes">

                <?php
                    // Ejecutar consulta
                    $query = "SELECT UsuarioID, FirstName, LastName, Email, Telefono, Direccion, Estado FROM Usuarios WHERE ROL = 'Usuario'";
                    $result = $conn->query($query);

                    // Verificar si hay resultados
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['UsuarioID']}</td>";
                            echo "<td>{$row['FirstName']} {$row['LastName']}</td>";
                            echo "<td>{$row['Email']}</td>";
                            echo "<td>{$row['Telefono']}</td>";
                            echo "<td>{$row['Direccion']}</td>";
                            echo "<td>{$row['Estado']}</td>";
                            echo "<td>
                                    <button 
                                        class='btn btn-primary btn-sm editBtn' 
                                        data-id='{$row['UsuarioID']}'
                                        data-firstname='{$row['FirstName']}' 
                                        data-lastname='{$row['LastName']}' 
                                        data-email='{$row['Email']}'
                                        data-telefono='{$row['Telefono']}'
                                        data-direccion='{$row['Direccion']}'
                                        data-estado='{$row['Estado']}'>
                                        Editar
                                    </button>
                                    <a href='../../../BackEnd/routes/deleteUser.php?id={$row['UsuarioID']}' class='btn btn-danger btn-sm'>Eliminar</a>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No hay usuarios registrados</td></tr>";
                    }?>
                </tbody>
            </table>
        </div>

        <!-- Administradores -->
        <div class="table-container">
            <div class="d-flex gap-5 mb-2">
                <h2 class="text-muted">Administradores</h2>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody id="usuariosAdministradores">
                    
                </tbody>
            </table>
        </div>

    </div>

    <!-- Modal para agregar usuario -->
    <div class="modal fade" id="UserModal" tabindex="-1" aria-labelledby="UserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="UserModalLabel">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre Completo</label>
                            <input type="text" id="nombre" class="form-control" placeholder="Nombre del usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" id="correo" class="form-control" placeholder="Correo electrónico del usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" id="telefono" class="form-control" placeholder="Teléfono del usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" id="direccion" class="form-control" placeholder="Dirección del usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select id="estado" class="form-select" required>
                                <option value="Activo">Activo</option>
                                <option value="Suspendido">Suspendido</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Agregar Usuario</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar usuario -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editUserForm">
                    <div class="modal-body">
                        <input type="hidden" id="editUserId" name="userId">
                        <div class="mb-3">
                            <label for="editFirstName" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editFirstName" name="firstName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editLastName" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="editLastName" name="lastName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editTelefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="editTelefono" name="telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDireccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="editDireccion" name="direccion" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEstado" class="form-label">Estado</label>
                            <select class="form-select" id="editEstado" name="estado" required>
                                <option value="Activo">Activo</option>
                                <option value="Suspendido">Suspendido</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../js/modalEditar.js"></script>          
</body>
</html>