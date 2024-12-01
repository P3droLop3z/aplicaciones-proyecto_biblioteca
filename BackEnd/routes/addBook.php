<?php
require_once '../config/config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['title'], $data['authorFirstName'], $data['authorLastName'], $data['publicationYear'], $data['category'], $data['copies'])) {
    $title = trim($data['title']);
    $authorFirstName = trim($data['authorFirstName']);
    $authorLastName = trim($data['authorLastName']);
    $publicationYear = intval($data['publicationYear']);
    $category = trim($data['category']);
    $copies = intval($data['copies']);

    // Insertar categoría si no existe
    $query = "INSERT INTO Categorias (CategoryName) VALUES (?) ON DUPLICATE KEY UPDATE CategoryID=LAST_INSERT_ID(CategoryID)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $category);
    $stmt->execute();
    $categoryId = $conn->insert_id;

    // Insertar autor si no existe
    $query = "INSERT INTO Autores (FirstName, LastName) VALUES (?, ?) ON DUPLICATE KEY UPDATE AutorID=LAST_INSERT_ID(AutorID)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $authorFirstName, $authorLastName);
    $stmt->execute();
    $authorId = $conn->insert_id;

    // Insertar libro
    $query = "INSERT INTO Libros (Titulo, Apublicacion, CategoryID, AutorID, Copias) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('siiii', $title, $publicationYear, $categoryId, $authorId, $copies);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
