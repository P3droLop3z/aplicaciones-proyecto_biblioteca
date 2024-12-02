<?php
require_once '../config/config.php';

$userID = 16; // ID del usuario, que en tu caso puede estar fijo o ser dinámico

$query = "SELECT Prestamos.PrestamoID, Libros.Titulo, Prestamos.FechaPres, Prestamos.FechaLim, Prestamos.Estado
        FROM Prestamos
        JOIN Ejemplares ON Prestamos.EjemplarID = Ejemplares.EjemplarID
        JOIN Libros ON Ejemplares.LibroID = Libros.LibroID
        WHERE Prestamos.UsuarioID = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();

$prestamos = array();
while ($row = $result->fetch_assoc()) {
    $prestamos[] = $row;
}

echo json_encode($prestamos);
?>

