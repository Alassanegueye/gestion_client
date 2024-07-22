<?php
// Inclusion du fichier de connexion à la base de données
include_once "db.php";

// Traitement de la connexion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["connexion"])) {
    // Récupération des données du formulaire de connexion
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Requête SQL pour vérifier les informations d'identification
    $sql = "SELECT * FROM utilisateurs WHERE Adresse_Email='$email' AND MotDePasse='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // L'utilisateur est authentifié avec succès
        $row = $result->fetch_assoc();
        $role = $row['role'];

        if ($role == 'admin') {
            // Rediriger vers la page d'administration
            header("Location: accueil2.php");
            exit();
        } else {
            // Rediriger vers la page client
            header("Location: accueil.php");
            exit();
        }
    } else {
        // L'utilisateur n'est pas authentifié
        echo "Adresse email ou mot de passe incorrect.";
    }
}

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
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="img/ico-32.png">
    
    
</head>
<body>
    <header>
        <nav>
            <img src="img/ico-32.png" alt="Logo du Restaurant">
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="dropdown">
                <button class="button" id="login" onclick="toggleDropdown()">Se connecter</button>
                <div class="dropdown-content" id="dropdownContent">
                    <a href="#" onclick="openModal('loginModal')">Connexion</a>
                    <a href="#" onclick="openModal('registerModal')">Inscription</a>
                    <a href="#">Votre compte</a>
                    <a href="#">Vos commandes</a>
                    <a href="#">Votre liste d'envies</a>
                </div>
            </div>
        </nav>
    </header>
    <section id="home" class="banner">
        <h1>L'Auberge Des Saveurs</h1>
        <p>Une expérience culinaire unique</p>
        <a href="#" class="btn">Voir le Menu</a>
        <a id="reserveTableBtn" href="construction.php" class="btn">Reserver une Table</a>
    </section>
    
    
    <!-- Modal de connexion -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('loginModal')">&times;</span>
            <h2>Connexion</h2>
            <form method="post" action="">
                <input type="hidden" name="connexion" value="1">
                <label for="email">Adresse Email</label>
                <input type="email" name="email" required>
                <label for="password">Mot de Passe</label>
                <input type="password" name="password" required>
                <button type="submit" class="auth-button">Se connecter</button>
            </form>
        </div>
    </div>

    <!-- Modal d'inscription -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('registerModal')">&times;</span>
            <h2>Inscription</h2>
            <form method="post" action="">
                <input type="hidden" name="inscription" value="1">
                <label for="newFirstName">Prénom</label>
                <input type="text" name="newFirstName" required>
                <label for="newLastName">Nom</label>
                <input type="text" name="newLastName" required>
                <label for="newEmail">Adresse Email</label>
                <input type="email" name="newEmail" required>
                <label for="newPassword">Mot de Passe</label>
                <input type="password" name="newPassword" required>
                <button type="submit" class="auth-button">S'inscrire</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = "block";
        }

        function closeModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = "none";
        }

        function toggleDropdown() {
            const dropdownContent = document.getElementById('dropdownContent');
            if (dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
            } else {
                dropdownContent.style.display = 'block';
            }
        }

        // Fermer le dropdown si l'utilisateur clique en dehors
        window.onclick = function(event) {
            if (!event.target.matches('.button')) {
                const dropdownContent = document.getElementById('dropdownContent');
                if (dropdownContent.style.display === 'block') {
                    dropdownContent.style.display = 'none';
                }
            }
            // Fermer les modals si l'utilisateur clique en dehors
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        }
    </script>

</body>
</html>