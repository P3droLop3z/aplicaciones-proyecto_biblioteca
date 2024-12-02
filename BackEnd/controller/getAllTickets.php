<?php
require_once '../config/config.php';  // Configuración de la base de datos

// Consulta para obtener los datos de las multas
$sql = "
    SELECT 
        m.MultaID,
        CONCAT (u.FirstName,' ', u.LastName) AS Usuario,
        l.Titulo AS Libro, 
        m.Monto,
        m.FechaEmision,
        m.Estado
    FROM Multas m
    JOIN Prestamos p ON m.PrestamoID = p.PrestamoID
    JOIN Ejemplares e ON p.EjemplarID = e.EjemplarID
    JOIN Libros l ON e.LibroID = l.LibroID
    JOIN Usuarios u ON p.UsuarioID = u.UsuarioID
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $multas = [];

    while ($row = $result->fetch_assoc()) {
        $multas[] = $row;
    }

    echo json_encode(['success' => true, 'multas' => $multas]);
} else {
    echo json_encode(['success' => false, 'message' => 'No hay multas disponibles']);
}

$conn->close();
?>
