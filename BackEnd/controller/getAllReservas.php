<?php
require_once '../config/config.php';  // Configuración de la base de datos

// Consulta para obtener los datos de las reservas
$sql = "
    SELECT 
        r.ReservaID,
        CONCAT (u.FirstName,' ', u.LastName) AS Usuario,
        l.Titulo AS Libro,
        r.FechaRes,
        r.FechaExp,
        r.Estado
    FROM Reservas r
    JOIN Libros l ON r.LibroID = l.LibroID
    JOIN Usuarios u ON r.UsuarioID = u.UsuarioID
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $reservas = [];

    while ($row = $result->fetch_assoc()) {
        $reservas[] = $row;
    }

    echo json_encode(['success' => true, 'reservas' => $reservas]);
} else {
    echo json_encode(['success' => false, 'message' => 'No hay reservas disponibles']);
}

$conn->close();
?>
