<?php
require_once '../config/config.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['bookId'], $data['title'], $data['autorFN'], $data['autorLN'], $data['year'], $data['category'], $data['copies'])) {
    $bookId = intval($data['bookId']);
    $title = trim($data['title']);
    $autorfn = trim($data['autorFN']);
    $autorln = trim($data['autorLN']);
    $year = intval($data['year']);
    $category = trim($data['category']);
    $copies = intval($data['copies']);

    // Verificar o insertar categoría
    $query = "SELECT CategoryID FROM Categorias WHERE CategoryName = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $category);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $categoryId = $row['CategoryID'];
    } else {
        $query = "INSERT INTO Categorias (CategoryName) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $category);
        $stmt->execute();
        $categoryId = $conn->insert_id;
    }

    // Verificar o insertar autor
    $query = "SELECT AutorID FROM Autores WHERE FirstName = ? AND LastName = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $autorfn, $autorln);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $authorId = $row['AutorID'];
    } else {
        $query = "INSERT INTO Autores (FirstName, LastName) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $autorfn, $autorln);
        $stmt->execute();
        $authorId = $conn->insert_id;
    }

    // Actualizar libro
    $query = "UPDATE Libros SET Titulo = ?, Apublicacion = ?, CategoryID = ?, AutorID = ?, Copias = ? WHERE LibroID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('siiiii', $title, $year, $categoryId, $authorId, $copies, $bookId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el libro']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
}
?>
