<?php
require_once '../config/config.php'; // Conexión a la base de datos

// Verificar si se pasa un ID de libro
if (isset($_GET['bookID'])) {
    $bookID = $_GET['bookID'];

    // Consulta para obtener la información detallada del libro
    $query = "
        SELECT 
            b.LibroID, 
            b.Titulo, 
            b.Apublicacion, 
            b.Copias, 
            a.FirstName, a.LastName, 
            c.CategoryName 
        FROM Libros b
        JOIN Autores a ON b.AutorID = a.AutorID
        JOIN Categorias c ON b.CategoryID = c.CategoryID
        WHERE b.LibroID = ?
    ";

    // Preparar y ejecutar la consulta
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $bookID);
        $stmt->execute();
        $result = $stmt->get_result();

        // Si el libro existe, devolver los detalles
        if ($result->num_rows > 0) {
            $bookDetails = $result->fetch_assoc();
            echo json_encode($bookDetails);
        } else {
            echo json_encode(['error' => 'Libro no encontrado']);
        }
    } else {
        echo json_encode(['error' => 'Error en la consulta']);
    }
}
?>
