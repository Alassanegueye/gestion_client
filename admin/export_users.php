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
        <nav>
            <img src="img/ico-32.png" alt="Logo du Restaurant">
            <ul>
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="menu.php">Menu</a></li>
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
    <section id="user-list">
        <h1>Liste des Utilisateurs</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include ("db.php");

                // Requête SQL pour récupérer les utilisateurs
                $sql = "SELECT id, nom, email FROM utilisateurs";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Afficher les utilisateurs dans le tableau
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["nom"] . "</td>
                                <td>" . $row["email"] . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Aucun utilisateur trouvé</td></tr>";
                }

                // Fermer la connexion
                $conn->close();
                ?>
            </tbody>
        </table>
        <div class="btn-container">
            <a href="telecharger_pdf.php" class="btn">Télécharger PDF</a>
            <a href="telecharger_csv.php" class="btn">Télécharger CSV</a>
        </div>
    </section>
</body>
</html>
