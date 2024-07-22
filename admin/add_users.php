<?php
// Inclusion du fichier de connexion à la base de données
include_once "db.php";

// Traitement de l'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["inscription"])) {
    // Récupération des données du formulaire d'inscription
    $Nom = $_POST["newFirstName"];
    $Prenom = $_POST["newLastName"];
    $Adresse_Email = $_POST["newEmail"];
    $MotDePasse = $_POST["newPassword"];
    $role = 'client'; // Par défaut, le rôle est 'client' pour les nouvelles inscriptions

    // Requête SQL pour insérer les données dans la base de données
    $sql = "INSERT INTO utilisateurs (Nom, Prenom, Adresse_Email, MotDePasse, role) VALUES ('$Nom', '$Prenom', '$Adresse_Email', '$MotDePasse', '$role')";

    // Exécution de la requête SQL
    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie!";
        // Vous pouvez rediriger l'utilisateur vers une page de connexion, par exemple
    } else {
        echo "Erreur lors de l'inscription: " . $conn->error;
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
 
    
</head>
<body>
    <header>
        <nav>
            <img src="img/ico-32.png" alt="Logo du Restaurant">
            <ul>
                <li><a href="../accueil2.php">Accueil</a></li>
                <li><a href="../menu2.php">Menu</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="administrateur.php">Admin Dashboard</a></li>
                <li>
                    <a href="../home.php" onclick="return(confirm('Vous vous déconnectez ?'));">
                        <button type="submit"  class="disconnect">
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
        <a href="../menu2.php" class="btn">Voir le Menu</a>
        <a id="reserveTableBtn" href="construction.php" class="btn">Réserver une Table</a>
    </section>
    <main>
        <h1>Ajouter des Utilisateurs</h1>
        <form action="" method="POST">
        <input type="hidden" name="inscription" value="1">
                <label for="newFirstName">Prénom</label>
                <input type="text" name="newFirstName" required>
                <label for="newLastName">Nom</label>
                <input type="text" name="newLastName" required>
                <label for="newEmail">Adresse Email</label>
                <input type="email" name="newEmail" required>
                <label for="newPassword">Mot de Passe</label>
                <input type="password" name="newPassword" required>
                <button type="submit" class="auth-button"> Ajouter </button>
        </form>
    </main>
</body>
</html>
