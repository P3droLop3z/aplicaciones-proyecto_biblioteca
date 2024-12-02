<?php
require_once '../config/config.php';

if (isset($_GET['id'])) {
    $bookId = intval($_GET['id']);

    $query = "
        SELECT l.Titulo, l.Apublicacion, l.Copias,
            CONCAT(a.FirstName, ' ', a.LastName) AS Autor,
            c.CategoryName
        FROM Libros l
        JOIN Autores a ON l.AutorID = a.AutorID
        JOIN Categorias c ON l.CategoryID = c.CategoryID
        WHERE l.LibroID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $bookId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($book);
    } else {
        echo json_encode(['error' => 'Libro no encontrado']);
    }
} else {
    echo json_encode(['error' => 'ID no especificado']);
}
?>
