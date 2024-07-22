<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = $conn->real_escape_string($_POST['price']);

    $sql = $conn->prepare("UPDATE menu SET name=?, description=?, price=? WHERE id=?");
    $sql->bind_param("ssdi", $name, $description, $price, $id);

    if ($sql->execute()) {
        echo "L'élément de menu a été mis à jour avec succès";
    } else {
        echo "Erreur: " . $sql->error;
    }

    $sql->close();
    $conn->close();
}
?>
