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
    <title>Préstamos - Administrador</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./../css/books.css">
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
        <!-- Gestión de Libros -->
        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="section-title">Gestión de Libros</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BookModal">Agregar Libro</button>
            </div>
            <div class="table-responsive shadow-sm">
                <table class="table table-hover align-middle">
                    <thead class="table-warning">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Año de Publicacion</th>
                            <th>Categoria</th>
                            <th>Copias</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaLibros">
                        <?php
                            // Consulta para obtener los libros junto con la categoría y el autor
                            $query = "
                                SELECT l.LibroID, l.Titulo, l.Apublicacion, c.CategoryName, CONCAT(a.FirstName, ' ', a.LastName) AS Autor, l.Copias
                                FROM Libros l
                                JOIN Categorias c ON l.CategoryID = c.CategoryID
                                JOIN Autores a ON l.AutorID = a.AutorID";
                            $result = $conn->query($query);

                            // Verificar si hay resultados
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>{$row['LibroID']}</td>";
                                    echo "<td>{$row['Titulo']}</td>";
                                    echo "<td>{$row['Autor']}</td>";
                                    echo "<td>{$row['Apublicacion']}</td>";
                                    echo "<td>{$row['CategoryName']}</td>"; 
                                    echo "<td>{$row['Copias']}</td>";
                                    echo "<td>
                                            <button 
                                                class='btn btn-primary btn-sm editBookBtn' 
                                                data-id='{$row['LibroID']}'
                                                data-title='{$row['Titulo']}'
                                                data-author='{$row['Autor']}'
                                                data-year='{$row['Apublicacion']}'
                                                data-category='{$row['CategoryName']}'
                                                data-copies='{$row['Copias']}'>
                                                Editar
                                            </button>
                                            <a href='#' 
                                                class='btn btn-danger btn-sm deleteBookBtn' 
                                                data-id='{$row['LibroID']}'>
                                                Eliminar
                                            </a>
                                        </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center'>No hay libros registrados</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <!-- Modal para agregar libro-->
    <div class="modal fade" id="BookModal" tabindex="-1" aria-labelledby="BookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="BookModalLabel">Nuevo Libro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addBookForm">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título del Libro</label>
                            <input type="text" id="titulo" class="form-control" placeholder="Título del libro" required>
                        </div>
                        <div class="mb-3">
                            <label for="autor" class="form-label">Autor</label>
                            <input type="text" id="autorFirstName" name="autorFN" class="form-control" placeholder="Nombre del autor" required>
                            <input type="text" id="autorLastName" name="autorLN" class="form-control" placeholder="Apellido del autor" required>
                        </div>
                        <div class="mb-3">
                            <label for="publicationYear" class="form-label">Año de Publicación</label>
                            <input type="number" class="form-control" id="publicationYear" name="publicationYear" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Categoría</label>
                            <input type="text" class="form-control" id="categoryName" name="category" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" id="cantidad" class="form-control" placeholder="Cantidad de ejemplares" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Agregar Libro</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Modal para editar Libros -->
    <div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBookModalLabel">Editar Libro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editBookForm">
                    <div class="modal-body">
                        <input type="hidden" id="editBookId" name="bookId">
                        <div class="mb-3">
                            <label for="editBookTitle" class="form-label">Título</label>
                            <input type="text" class="form-control" id="editBookTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="autor" class="form-label">Autor</label>
                            <input type="text" id="editautorFirstName" name="autorFN" class="form-control" placeholder="Nombre del autor" required>
                            <input type="text" id="editautorLastName" name="autorLN" class="form-control" placeholder="Apellido del autor" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPublicationYear" class="form-label">Año de Publicación</label>
                            <input type="number" class="form-control" id="editPublicationYear" name="year" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCategory" class="form-label">Categoría</label>
                            <input type="text" class="form-control" id="editCategory" name="category" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCopies" class="form-label">Copias</label>
                            <input type="number" class="form-control" id="editCopies" name="copies" required>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/addBook.js"></script>
    <script src="../../js/modalEditBook.js"></script>
    <script src="../../js/deleteBook.js"></script>
</body>
</html>
