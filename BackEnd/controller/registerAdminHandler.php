<?php
require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $telefono = trim($_POST['tele']);
    $direccion = trim($_POST['dire']);
    $email = trim($_POST['Email']);
    $password = trim($_POST['pass']);

    // Validar si el correo ya existe
    $checkEmailQuery = "SELECT * FROM Usuarios WHERE Email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header('Location: ../interfaces/registerAdmin.php?error=El correo ya está registrado');
        exit();
    }

    // Encriptar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertar datos en la base de datos
    $insertQuery = "INSERT INTO Usuarios (FirstName, LastName, Email, pass, Telefono, Direccion, fechaReg, Estado, ROL) 
                    VALUES (?, ?, ?, ?, ?, ?, CURDATE(), 'Activo', 'Administrador')";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param('ssssss', $firstName, $lastName, $telefono, $direccion, $email, $hashed_password);

    if ($stmt->execute()) {
        header('Location: ../FrontEnd/index.html?success=Administrador registrado con éxito');
        exit();
    } else {
        header('Location: ../interfaces/registerAdmin.php?error=Error al registrar el administrador');
        exit();
    }
} else {
    header('Location: ../interfaces/registerAdmin.php');
    exit();
}
?>
<h2>gfjfh</h2>