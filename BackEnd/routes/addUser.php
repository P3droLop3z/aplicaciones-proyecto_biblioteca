<?php
require_once '../config/config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['firstName'], $data['lastName'], $data['email'], $data['passw'], $data['telefono'], $data['direccion'])) {
    $firstName = trim($data['firstName']);
    $lastName = trim($data['lastName']);
    $email = trim($data['email']);
    $telefono = trim($data['telefono']);
    $direccion = trim($data['direccion']);
    $passwor = trim($data['passw']);

    // Encriptar la contraseña
    $hashed_password = password_hash($passwor, PASSWORD_DEFAULT);

    $query = "INSERT INTO Usuarios (FirstName, LastName, Email, pass, Telefono, Direccion, fechaReg, Estado, ROL) 
            VALUES (?, ?, ?, ?, ?, ?, CURDATE(), 'Activo', 'Usuario')";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssss', $firstName, $lastName, $email, $hashed_password, $telefono, $direccion);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
