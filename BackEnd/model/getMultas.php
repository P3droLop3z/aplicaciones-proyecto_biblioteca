<?php
require_once '../config/config.php';

// Consulta para obtener los registros de las multas
$query = "SELECT m.MultaID, p.PrestamoID, l.Titulo AS Libro, m.Monto, m.FechaEmision, m.Estado
        FROM Multas m
        JOIN Prestamos p ON m.PrestamoID = p.PrestamoID
        JOIN Ejemplares e ON p.EjemplarID = e.EjemplarID
        JOIN Libros l ON e.LibroID = l.LibroID";

// Ejecutar la consulta
$result = $conn->query($query);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los resultados
    $multas = [];
    while ($row = $result->fetch_assoc()) {
        $multas[] = $row;
    }

    // Devolver los resultados como JSON
    echo json_encode(['success' => true, 'multas' => $multas]);
} else {
    echo json_encode(['success' => false, 'message' => 'No hay multas registradas']);
}
?>
