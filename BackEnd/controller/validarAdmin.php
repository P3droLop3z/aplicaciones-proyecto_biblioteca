<?php
session_start();
require_once '../config/config.php'; // Archivo de conexión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['Email'];
    $password = $_POST['pass'];

    // Consulta para validar al administrador
    $query = "SELECT * FROM Usuarios WHERE Email = ? AND ROL = 'Administrador'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        // Verificar contraseña
        if (password_verify($password, $admin['pass'])) {
            $_SESSION['admin_id'] = $admin['UsuarioID'];
            $_SESSION['admin_name'] = $admin['FirstName'] . ' ' . $admin['LastName'];
            header('Location: ../FrontEnd/index.html');
            exit();
        } else {
            header('Location: ../interfaces/loginAdmin.php?error=Contraseña incorrectaa');
            exit();
        }
    } else {
        header('Location: ../interfaces/loginAdmin.php?error=Administrador no encontrado');
        exit();
    }
} else {
    header('Location: ../interfaces/loginAdmin.php');
    exit();
}
?>
