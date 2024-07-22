<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hasher le mot de passe
    $role = $conn->real_escape_string($_POST['role']);

    $sql = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $username, $email, $password, $role);

    if ($sql->execute()) {
        header("Location: manage_users.php");
    } else {
        echo "Erreur: " . $sql->error;
    }

    $sql->close();
    $conn->close();
}
?>
