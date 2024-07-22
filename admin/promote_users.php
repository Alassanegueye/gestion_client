<?php
include_once "../db.php";

// Vérifiez si l'utilisateur est administrateur
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["promote"])) {
    $userId = $_POST["user_id"];
    $sql = "UPDATE utilisateurs SET role='admin' WHERE id='$userId'";
    if ($conn->query($sql) === TRUE) {
        $message = "Utilisateur promu au rôle d'administrateur avec succès.";
    } else {
        $message = "Erreur lors de la promotion: " . $connexion->error;
    }
}

// Récupération de la liste des utilisateurs
$sql = "SELECT * FROM utilisateurs";
$result = $conn->query($sql);
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
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="menu2.php">Menu</a></li>
                <li><a href="construction.php">Contact</a></li>
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
        <a href="menu2.php" class="btn">Voir le Menu</a>
        <a id="reserveTableBtn" href="construction.php" class="btn">Réserver une Table</a>
    </section>
<body>
    <h1>Promouvoir Utilisateurs</h1>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["Nom"]; ?></td>
            <td><?php echo $row["Prenom"]; ?></td>
            <td><?php echo $row["Adresse_Email"]; ?></td>
            <td><?php echo $row["role"]; ?></td>
            <td>
                <?php if ($row["role"] != 'admin') { ?>
                <form method="post" action="promote_users.php">
                    <input type="hidden" name="user_id" value="<?php echo $row["id"]; ?>">
                    <button type="submit" name="promote" class="btn btn-primary">Promouvoir</button>
                </form>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
