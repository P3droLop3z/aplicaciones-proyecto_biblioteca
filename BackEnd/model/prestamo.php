<?php
require_once '../config/config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['bookId'], $data['loanDate'], $data['dueDate'], $data['status'], $data['userId'])) {
    $bookId = intval($data['bookId']);
    $loanDate = $data['loanDate'];
    $dueDate = $data['dueDate'];
    $status = $data['status'];
    $userId = intval($data['userId']);

    // Obtener el ID del ejemplar disponible (estado 'Disponible')
    $query = "SELECT EjemplarID FROM Ejemplares WHERE LibroID = ? AND Estado = 'Disponible' LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $bookId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $ejemplar = $result->fetch_assoc();
        $ejemplarId = $ejemplar['EjemplarID'];

    // Actualizar el ejemplar a "Prestado"
    $updateQuery = "UPDATE Ejemplares SET Estado = 'Prestado' WHERE EjemplarID = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param('i', $ejemplarId);
    $updateStmt->execute();


    // Insertar el préstamo en la base de datos
    $query = "INSERT INTO Prestamos (EjemplarID, UsuarioID, FechaPres, FechaLim, Estado) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iisss', $ejemplarId, $userId, $loanDate, $dueDate, $status);

        if ($stmt->execute()) {
            // Decrementar las copias disponibles del libro
            $decrementQuery = "UPDATE Libros SET CopiasDisp = Copias - 1 WHERE LibroID = ?";
            $decrementStmt = $conn->prepare($decrementQuery);
            $decrementStmt->bind_param('i', $bookId);
            $decrementStmt->execute();

            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'No se pudo insertar el préstamo']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'No hay ejemplares disponibles para este libro']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Datos incompletos']);
    }
?>
