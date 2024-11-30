<?php
require_once '../config/config.php';

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);

    $query = "DELETE FROM Usuarios WHERE UsuarioID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $userId);

    if ($stmt->execute()) {
        header('Location: http://localhost:8888/aplicaciones-proyecto_biblioteca/FrontEnd/admin/pages/users.php?success=Usuario eliminado');
        exit();
    } else {
        header('Location: http://localhost:8888/aplicaciones-proyecto_biblioteca/FrontEnd/admin/pages/users.php?error=No se pudo eliminar al usuario');
        exit();
    }
} else {
    header('Location: http://localhost:8888/aplicaciones-proyecto_biblioteca/FrontEnd/admin/pages/users.php');
    exit();
}
?>
