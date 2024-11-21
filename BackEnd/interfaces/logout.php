<?php
    session_start();
    session_destroy();
    header('Location: ../interfaces/loginAdmin.php');
    exit();
?>
