<?php
session_start();
require_once '../config/config.php'; // Archivo de conexión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Consulta para validar al usuario
    $query = "SELECT * FROM Usuarios WHERE Email = ? AND ROL = 'Usuario'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        // Verificar contraseña
        if (password_verify($password, $admin['pass'])) {
            $_SESSION['user_id'] = $admin['UsuarioID'];
            $_SESSION['user_name'] = $admin['FirstName'] . ' ' . $admin['LastName'];
            header('Location: http://localhost:8888/aplicaciones-proyecto_biblioteca/FrontEnd/user/pages/menu.html');
            exit();
        } else {
            header('Location: ./../../FrontEnd/user/main.php?error=Contraseña incorrectaa');
            exit();
        }
    } else {
        header('Location: ./../../FrontEnd/user/main.php?error=Usuario no encontrado');
        exit();
    }
} else {
    header('Location: ./../../FrontEnd/user/main.php');
    exit();
}
?>