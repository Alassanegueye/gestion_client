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
        <h1>Modifier un élément du menu</h1>
        <form method="GET" action="">
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
            <input type="submit" value="Modifier">
        </form>

        <?php
        // Si un élément de menu est sélectionné, afficher le formulaire pour le modifier
        if (isset($_GET['menuItem'])) {
            $menuItemId = $_GET['menuItem'];

            // Récupérer les détails de l'élément sélectionné
            $sql = "SELECT * FROM menu WHERE id=$menuItemId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $menuItem = $result->fetch_assoc();
            ?>
                <form action="update_menu_item.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $menuItem['id']; ?>">
                    <label for="name">Nom:</label>
                    <input type="text" id="name" name="name" value="<?php echo $menuItem['name']; ?>" required><br>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required><?php echo $menuItem['description']; ?></textarea><br>
                    <label for="price">Prix:</label>
                    <input type="text" id="price" name="price" value="<?php echo $menuItem['price']; ?>" required><br>
                    <input type="submit" value="Mettre à jour">
                </form>
            <?php
            } else {
                echo "Aucun élément trouvé.";
            }
        }
        $conn->close();
        ?>
    </main>
</body>
</html>
