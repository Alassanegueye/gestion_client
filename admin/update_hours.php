<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hours = $_POST['hours'];

    $sql = "UPDATE contact_info SET hours=? WHERE id=1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $hours);

    if ($stmt->execute()) {
        echo "Les horaires ont été mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour des horaires: " . $conn->error;
    }

    $stmt->close();
}

$sql = "SELECT hours FROM contact_info WHERE id=1";
$result = $conn->query($sql);
$contactInfo = $result->fetch_assoc();

$conn->close();
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
    <main>
        <h1>Mettre à jour les horaires</h1>
        <form method="POST" action="">
            <label for="hours">Horaires:</label>
            <textarea id="hours" name="hours" required><?php echo $contactInfo['hours']; ?></textarea>
            <input type="submit" value="Mettre à jour">
        </form>
    </main>
</body>
</html>
