<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['users'])) {
        $users = $_POST['users'];

        // Convertir le tableau en chaîne pour l'instruction SQL
        $usersList = implode("','", $users);

        // Supprimer les utilisateurs sélectionnés de la base de données
        $sql = "DELETE FROM utilisateurs WHERE nom IN ('$usersList')";

        if ($conn->query($sql) === TRUE) {
            echo "Utilisateurs supprimés avec succès.";
        } else {
            echo "Erreur lors de la suppression des utilisateurs : " . $conn->error;
        }
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <nav>
            <img src="img/ico-32.png" alt="Logo du Restaurant">
            <ul>
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="menu2.php">Menu</a></li>
                <li><a href="construction.php">Contact</a></li>
                <li><a href="administrateur.php">Admin Dashboard</a></li>
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
        <a href="menu2.php" class="btn">Voir le Menu</a>
        <a id="reserveTableBtn" href="construction.php" class="btn">Réserver une Table</a>
    </section>
    <main>
        <h1>Supprimer des Utilisateurs</h1>
        <p>Sélectionnez les utilisateurs que vous souhaitez supprimer :</p>
        <form action="delete_users.php" method="POST">
            <ul>
                <?php
                // Fetch users from the database
                $sql = "SELECT nom FROM utilisateurs";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<li><input type="checkbox" id="user' . htmlspecialchars($row["nom"]) . '" name="users[]" value="' . htmlspecialchars($row["nom"]) . '"><label for="user' . htmlspecialchars($row["nom"]) . '">' . htmlspecialchars($row["nom"]) . '</label></li>';
                    }
                } else {
                    echo "0 utilisateurs trouvés.";
                }
                $conn->close();
                ?>
            </ul>
            <input type="submit" value="Supprimer">
        </form>
    </main>
</body>
</html>
