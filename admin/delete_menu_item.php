<?php
include 'db.php';

// Récupérer les éléments du menu pour les afficher dans le formulaire
$sql = "SELECT id, name FROM menu";
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
                <li><a href="../accueil.php">Accueil</a></li>
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
        <h1>Supprimer un élément du menu</h1>
        <form method="POST" action="delete_menu_item.php">
            <label for="menuItem">Sélectionner un élément du menu:</label>
            <select id="menuItem" name="menuItem" required>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Aucun élément disponible</option>";
                }
                ?>
            </select>
            <input type="submit" value="Supprimer">
        </form>
    </main>

    <?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $menuItemId = $_POST['menuItem'];

    // Supprimer l'élément du menu
    $sql = "DELETE FROM menu WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $menuItemId);

    if ($stmt->execute()) {
        echo "L'élément a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'élément: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

</body>
</html>

