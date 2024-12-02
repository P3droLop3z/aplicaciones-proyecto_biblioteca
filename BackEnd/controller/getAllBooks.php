<?php
require_once '../config/config.php';

$perPage = 10; // Número máximo de libros por página
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $perPage;

// Obtener el número total de libros
$totalQuery = "SELECT COUNT(*) AS total FROM Libros";
$totalResult = $conn->query($totalQuery);
$totalBooks = $totalResult->fetch_assoc()['total'];

// Consulta para obtener los libros con paginación
$query = "
    SELECT l.LibroID, l.Titulo, l.Apublicacion, 
        CONCAT(a.FirstName, ' ', a.LastName) AS Autor,
        c.CategoryName
    FROM Libros l
    JOIN Autores a ON l.AutorID = a.AutorID
    JOIN Categorias c ON l.CategoryID = c.CategoryID
    LIMIT ? OFFSET ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ii', $perPage, $offset);
$stmt->execute();
$result = $stmt->get_result();

$books = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

// Devolver los libros y el total
header('Content-Type: application/json');
echo json_encode([
    'books' => $books,
    'totalBooks' => $totalBooks,
    'perPage' => $perPage,
    'currentPage' => $page
]);
?>
