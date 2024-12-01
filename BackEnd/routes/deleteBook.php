<?php
require_once '../config/config.php';

if (isset($_GET['id'])) {
    $LibroID = intval($_GET['id']);

    // Eliminar el libro por ID
    $query = "DELETE FROM Libros WHERE LibroID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $LibroID);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID de libro no especificado']);
}
?>
