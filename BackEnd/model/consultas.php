<?php
include '../config/config.php';

$sql = "SELECT * FROM Libros";
$result = $conn->query($sql);

$libros = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $libros[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($libros);

$conn->close();
?>
