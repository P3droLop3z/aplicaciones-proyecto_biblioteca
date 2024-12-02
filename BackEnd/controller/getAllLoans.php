<?php
require_once '../config/config.php';  // Configuración de la base de datos

// Consulta para obtener los datos de los préstamos
$sql = "
    SELECT 
        p.PrestamoID,
        CONCAT (u.FirstName,' ', u.LastName) AS Usuario,
        l.Titulo AS Libro,
        p.FechaPres,
        p.FechaDev,
        p.FechaLim,
        p.Estado
    FROM prestamos p
    JOIN Usuarios u ON p.UsuarioID = u.UsuarioID
    JOIN Ejemplares e ON p.EjemplarID = e.EjemplarID
    JOIN libros l ON e.LibroID = l.LibroID
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $prestamos = [];

    while ($row = $result->fetch_assoc()) {
        $prestamos[] = $row;
    }

    echo json_encode(['success' => true, 'prestamos' => $prestamos]);
} else {
    echo json_encode(['success' => false, 'message' => 'No hay préstamos disponibles']);
}

$conn->close();
?>
