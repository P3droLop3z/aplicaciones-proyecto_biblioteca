<?php
require_once '../config/config.php';

// Consulta para obtener los primeros 8 libros
$query = "
    SELECT l.LibroID, l.Titulo, l.Apublicacion, l.Copias,
        CONCAT(a.FirstName, ' ', a.LastName) AS Autor,
        c.CategoryName
    FROM Libros l
    JOIN Autores a ON l.AutorID = a.AutorID
    JOIN Categorias c ON l.CategoryID = c.CategoryID
    LIMIT 8";

$result = $conn->query($query);

$books = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($books);
?>
