<?php
require_once '../config/config.php';

// Obtener el ID del préstamo desde el cuerpo de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['prestamoID'])) {
    $prestamoID = intval($data['prestamoID']);

    // Obtener la fecha actual para la fecha de devolución
    $fechaDevolucion = date('Y-m-d'); // Formato YYYY-MM-DD 

    // Iniciar la transacción para asegurarnos de que ambos cambios se realicen correctamente
    $conn->begin_transaction();

    try {
        // Actualizar el estado del préstamo a "Devuelto" (o similar)
        $query = "UPDATE Prestamos SET FechaDev = ?, Estado = 'Devuelto' WHERE PrestamoID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $fechaDevolucion, $prestamoID);

        // Ejecutar la consulta de actualización
        if (!$stmt->execute()) {
            throw new Exception("Error al actualizar el estado del préstamo");
        }

        // Actualizar el estado del ejemplar a "Disponible"
        $queryEjemplar = "UPDATE Ejemplares SET Estado = 'Disponible' WHERE EjemplarID IN (SELECT EjemplarID FROM prestamos WHERE PrestamoID = ?)";
        $stmtEjemplar = $conn->prepare($queryEjemplar);
        $stmtEjemplar->bind_param("i", $prestamoID);
        if (!$stmtEjemplar->execute()) {
            throw new Exception("Error al actualizar el estado del ejemplar");
        }

        // Si todo salió bien, confirmar la transacción
        $conn->commit();

        // Responder con éxito
        echo json_encode(['success' => true]);

    }catch (Exception $e) {
        // En caso de error, revertir la transacción
        $conn->rollback();
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'PrestamoID no válido']);
    }
?>
