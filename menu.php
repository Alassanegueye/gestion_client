<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - L'Auberge Des Saveurs</title>
    <link rel="stylesheet" href="css/restaurant.css">
    <link rel="shortcut icon" href="img/ico-32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <header>
        <nav>
            <img src="img/ico-32.png" alt="Logo du Restaurant">
            <ul>
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="construction.php">Contact</a></li>   
            </ul>
        </nav>
    </header>
    <section id="home" class="banner">
        <h1>L'Auberge Des Saveurs</h1>
        <p>Un menu conçu pour sublimer chaque moment.</p>
        <a href="#" class="btn btn-commander">Commander</a>
        <a id="reserveTableBtn" href="construction.php" class="btn">Réserver une Table</a>
    </section>

    <section id="menu" class="menu-section">
        <div class="menu-buttons">
            <button onclick="showMenu('dejeuner')">Déjeuner</button>
            <button onclick="showMenu('dessert')">Dessert</button>
            <button onclick="showMenu('diner')">Dîner</button>
        </div>
        <div id="dejeuner" class="menu-content">
    <h2>Déjeuner</h2>
    <p>Savourez chaque matin avec notre sélection exquise. </p>
        <!-- Contenu du menu de déjeuner -->
        <section class="widgets">
        <div class="widget">
            <img src="img/Carré d'agneau en croûte d'herbes.jpg" alt="Image 1">
            <h3>Carré d'Agneau</h3>
            <p>Carré d'agneau rôti avec une croûte d'herbes aromatiques, servi avec des légumes de saison rôtis et une sauce au romarin.</p>
            <p>Prix : 20€</p>
                    <label for="quantite-agneau">Quantité:</label>
                    <input type="number" id="quantite-agneau" value="1" min="1">
                    <button class="btn-ajouter" onclick="ajouterAuPanier('Carré d\'Agneau', 20)">Ajouter à la commande</button>
                
        </div>
        <div class="widget">
            <img src="img/90caaa56255abb31bfff1623161d76ce.jpg" alt="Image 2">
            <h3>Poulet Rôti</h3>
            <p>Poulet rôti savoureux, parfaitement grillé et agrémenté de fines herbes, accompagné de frites croustillantes dorées à la perfection. Une touche de persil frais vient sublimer ce classique indémodable, idéal pour un repas réconfortant et délicieux.</p>
        </div>
        <div class="widget">
            <img src="img/Filet de veau aux morilles.jpg" alt="Image 3">
            <h3>Filet De Veau</h3>
            <p>Filet de veau tendre, servi avec une sauce crémeuse aux morilles et accompagné de légumes printaniers.</p>
        </div>
        <div class="widget">
            <img src="img/3717ab0c5c6561d18cde33d26d602f3f.jpg" alt="Image 4">
            <h3>Tartare De Saumon</h3>
            <p>Un tartare de saumon frais, délicatement mélangé avec de l'avocat crémeux et des morceaux de mangue juteuse, relevé d'une vinaigrette aux agrumes.</p>
        </div>
        <div class="widget">
            <img src="img/filet de boeuf.jpg" alt="Image 5">
            <h3>Filet De Boeuf Rossini</h3>
            <p>Filet de boeuf de première qualité, surmonté de foie gras poêlé, accompagné d'une sauce périgourdine à la truffe et de pommes de terre duchesse.</p>
        </div>
        <div class="widget">
            <img src="img/Magret de canard aux cerises.jpg" alt="Image 6">
            <h3>Magret de canard</h3>
            <p>Magret de canard rôti, nappé d'une réduction de cerises et vin rouge, accompagné de gratin dauphinois.</p>
        </div>
</section>
        
    </div>
</div>

<div id="dessert" class="menu-content" style="display: none;">
    <h2>Dessert</h2>
    <p>Insérez ici les desserts.</p>
        <!-- Contenu du menu de dessert -->
        <section class="widgets">
        <div class="widget">
            <img src="img/Carré d'agneau en croûte d'herbes.jpg" alt="Image 1">
            <h3>Carré d'Agneau</h3>
            <p>Carré d'agneau rôti avec une croûte d'herbes aromatiques, servi avec des légumes de saison rôtis et une sauce au romarin.</p>
        </div>
        <div class="widget">
            <img src="img/90caaa56255abb31bfff1623161d76ce.jpg" alt="Image 2">
            <h3>Poulet Rôti</h3>
            <p>Poulet rôti savoureux, parfaitement grillé et agrémenté de fines herbes, accompagné de frites croustillantes dorées à la perfection. Une touche de persil frais vient sublimer ce classique indémodable, idéal pour un repas réconfortant et délicieux.</p>
        </div>
        <div class="widget">
            <img src="img/Filet de veau aux morilles.jpg" alt="Image 3">
            <h3>Filet De Veau</h3>
            <p>Filet de veau tendre, servi avec une sauce crémeuse aux morilles et accompagné de légumes printaniers.</p>
        </div>
        <div class="widget">
            <img src="img/3717ab0c5c6561d18cde33d26d602f3f.jpg" alt="Image 4">
            <h3>Tartare De Saumon</h3>
            <p>Un tartare de saumon frais, délicatement mélangé avec de l'avocat crémeux et des morceaux de mangue juteuse, relevé d'une vinaigrette aux agrumes.</p>
        </div>
        <div class="widget">
            <img src="img/filet de boeuf.jpg" alt="Image 5">
            <h3>Filet De Boeuf Rossini</h3>
            <p>Filet de boeuf de première qualité, surmonté de foie gras poêlé, accompagné d'une sauce périgourdine à la truffe et de pommes de terre duchesse.</p>
        </div>
        <div class="widget">
            <img src="img/Magret de canard aux cerises.jpg" alt="Image 6">
            <h3>Magret de canard</h3>
            <p>Magret de canard rôti, nappé d'une réduction de cerises et vin rouge, accompagné de gratin dauphinois.</p>
        </div>
</section>
    </div>
</div>

<div id="diner" class="menu-content" style="display: none;">
    <h2>Dîner</h2>
    <p>Insérez ici les plats pour le dîner.</p>
        <!-- Contenu du menu de dîner -->
        <section class="widgets">

        <div class="widget">
            <img src="img/90caaa56255abb31bfff1623161d76ce.jpg" alt="Image 2">
            <h3>Poulet Rôti</h3>
            <p>Poulet rôti savoureux, parfaitement grillé et agrémenté de fines herbes, accompagné de frites croustillantes dorées à la perfection. Une touche de persil frais vient sublimer ce classique indémodable, idéal pour un repas réconfortant et délicieux.</p>
        </div>
        <div class="widget">
            <img src="img/Filet de veau aux morilles.jpg" alt="Image 3">
            <h3>Filet De Veau</h3>
            <p>Filet de veau tendre, servi avec une sauce crémeuse aux morilles et accompagné de légumes printaniers.</p>
        </div>
        <div class="widget">
            <img src="img/3717ab0c5c6561d18cde33d26d602f3f.jpg" alt="Image 4">
            <h3>Tartare De Saumon</h3>
            <p>Un tartare de saumon frais, délicatement mélangé avec de l'avocat crémeux et des morceaux de mangue juteuse, relevé d'une vinaigrette aux agrumes.</p>
        </div>
        <div class="widget">
            <img src="img/filet de boeuf.jpg" alt="Image 5">
            <h3>Filet De Boeuf Rossini</h3>
            <p>Filet de boeuf de première qualité, surmonté de foie gras poêlé, accompagné d'une sauce périgourdine à la truffe et de pommes de terre duchesse.</p>
        </div>
        <div class="widget">
            <img src="img/Magret de canard aux cerises.jpg" alt="Image 6">
            <h3>Magret de canard</h3>
            <p>Magret de canard rôti, nappé d'une réduction de cerises et vin rouge, accompagné de gratin dauphinois.</p>
        </div>
</section>

    </div>
</div>

        

    <footer>
        <p>&copy; 2024 L'Auberge Des Saveurs. Tous droits réservés.</p>
        <ul class="social-links">
            <li><a href="#"><img src="img/icons8-snapchat-50 (1).png" alt="snapchat"></a></li>
            <li><a href="#"><img src="img/icons8-instagram-50 (1).png" alt="Instagram"></a></li>
            <li><a href="#"><img src="img/icons8-twitter-50.png" alt="Twitter"></a></li>
        </ul>
    </footer>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(function(item) {
                item.classList.add('show'); // Ajouter la classe 'show' pour afficher l'image progressivement
            });
        });

        function showMenu(menuId) {
    // Masquer tous les menus
    var menus = document.querySelectorAll('.menu-content');
    menus.forEach(function(menu) {
        menu.style.display = 'none';
    });

    // Afficher le menu spécifié
    var menuToShow = document.getElementById(menuId);
    if (menuToShow) {
        menuToShow.style.display = 'block';
    }
}


    </script> 

   
</body>
</html>