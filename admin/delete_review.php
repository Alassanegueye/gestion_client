<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reviewId = $_POST['reviewId'];

    $sql = "DELETE FROM reviews WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reviewId);

    if ($stmt->execute()) {
        echo "L'avis a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'avis: " . $conn->error;
    }

    $stmt->close();
}

$sql = "SELECT id, customer_name, review_text FROM reviews";
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
                <li><a href="#contact">Contact</a></li>
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
        <h1>Supprimer un avis</h1>
        <form method="POST" action="">
            <label for="reviewId">Sélectionner un avis:</label>
            <select id="reviewId" name="reviewId" required>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['customer_name'] . " - " . $row['review_text'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Aucun avis disponible</option>";
                }
                ?>
            </select>
            <input type="submit" value="Supprimer">
        </form>
    </main>
</body>
</html>

<?php
$conn->close();
?>
