<?php
require_once '../config/config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['userId'], $data['firstName'], $data['lastName'], $data['email'], $data['telefono'], $data['direccion'], $data['estado'])) {
    $userId = intval($data['userId']);
    $firstName = trim($data['firstName']);
    $lastName =trim($data['lastName']);
    $email = trim($data['email']);
    $telefono = trim($data['telefono']);
    $direccion = trim($data['direccion']);
    $estado = trim($data['estado']);

    $query = "UPDATE Usuarios SET FirstName = ?, LastName = ?, Email = ?, Telefono = ?, Direccion = ?, Estado = ? WHERE UsuarioID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssssi', $firstName, $lastName, $email, $telefono, $direccion, $estado, $userId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
