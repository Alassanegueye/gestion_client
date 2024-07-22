<?php
include 'db.php'; // Supposons que vous ayez un fichier nommé db.php pour la connexion à la base de données

// Récupérer les informations de l'utilisateur si l'ID est fourni
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Assurez-vous que l'ID est un entier

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "Aucun utilisateur trouvé";
        exit();
    }
}

// Mettre à jour les informations de l'utilisateur si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']); // Assurez-vous que l'ID est un entier
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $role = $conn->real_escape_string($_POST['role']);

    $sql = $conn->prepare("UPDATE users SET username=?, email=?, role=? WHERE id=?");
    $sql->bind_param("sssi", $username, $email, $role, $id);

    if ($sql->execute()) {
        header("Location: manage_users.php");
    } else {
        echo "Erreur: " . $sql->error;
    }

    $sql->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Auberge Des Saveurs</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="shortcut icon" href="img/ico-32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <header>
        <nav class="main-nav">
            <img src="img/ico-32.png" alt="Logo du Restaurant">
            <ul class="nav-list">
                <li><a href="../accueil2.php">Accueil</a></li>
                <li><a href="../menu2.php">Menu</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="../administrateur.php">Admin Dashboard</a></li>
                <li>
                    <a href="../home.php" onclick="return(confirm('Vous vous déconnectez ?'));">
                        <button type="submit" class="disconnect">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </button>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <section id="home" class="banner">
        <h1>L'Auberge Des Saveurs</h1>
        <p>Une expérience culinaire unique</p>
        <a href="menu2.php" class="btn btn-primary">Voir le Menu</a>
        <a id="reserveTableBtn" href="construction.php" class="btn btn-secondary">Réserver une Table</a>
    </section>
    <main>
        <h1>Modifier Utilisateur</h1>
        <?php if (isset($user)): ?>
        <form action="edit_user.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>
            <label for="role">Rôle:</label>
            <select id="role" name="role" required>
                <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="user" <?php if ($user['role'] == 'user') echo 'selected'; ?>>Utilisateur</option>
            </select><br>
            <input type="submit" value="Mettre à jour" class="btn btn-primary">
        </form>
        <?php else: ?>
        <p>Aucun utilisateur trouvé.</p>
        <?php endif; ?>
    </main>
</body>
</html>
