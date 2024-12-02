<?php
require_once '../config/config.php';

// Consulta para obtener los registros de la tabla de reservas
$query = "SELECT r.ReservaID, r.FechaRes, r.FechaExp, l.Titulo, r.Estado
        FROM Reservas r
        JOIN Libros l ON r.LibroID = l.LibroID";

//Ejecutar la consulta
$result = $conn->query($query);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los resultados
    $reservas = [];
    while ($row = $result->fetch_assoc()) {
        $reservas[] = $row;
    }

    // Devolver los resultados como JSON
    echo json_encode(['success' => true, 'reservas' => $reservas]);
} else {
    echo json_encode(['success' => false, 'message' => 'No hay reservas']);
}

?>
