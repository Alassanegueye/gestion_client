<?php
// Inclure le fichier de connexion à la base de données
include_once 'db.php';

// Vérifier si le formulaire d'inscription a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["inscription"])) {
    // Récupérer les valeurs du formulaire d'inscription
    $Nom = $_POST["Nom"];
    $Prenom = $_POST["Prenom"];
    $Adresse_Email = $_POST["Adresse_Email"];
    $MotDePasse = $_POST["MotDePasse"];

    // Préparer et exécuter la requête d'insertion dans la base de données
    $sql = "INSERT INTO utilisateurs (Nom, Prenom, Adresse_Email, MotDePasse) VALUES (?, ?, ?, ?)";
    $requete = $connexion->prepare($sql);
    $requete->bind_param("ssss", $Nom, $Prenom, $Email, $MotDePasse);

    if ($requete->execute()) {
        echo "Inscription réussie!";
        // Rediriger l'utilisateur vers une page de confirmation, par exemple
        // header("Location: confirmation.php");
        // exit();
    } else {
        echo "Erreur lors de l'inscription: " . $requete->error;
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Auberge Des Saveurs</title>
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
                
                <li>
                    <a href="home.php" onclick="return(confirm('Vous vous déconnectez ?'));">
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
        <a href="menu.php" class="btn">Voir le Menu</a>
        <a id="reserveTableBtn" href="#" class="btn">Réserver une Table</a>
    </section>
    <section id="about">
    <h2>À propos de Nous</h2>
    <h4>Découvrez notre histoire et notre passion pour la cuisine.</h4>
    <div id="aboutText" class="hidden">
        <p>Bienvenue à l'Auberge des Saveurs, une destination culinaire emblématique à Dakar, où l'histoire se mêle à la gastronomie pour créer une expérience inoubliable.</p>
        <p>Niché dans le charmant quartier côtier d'Almadie, notre restaurant est bien plus qu'un simple lieu de restauration - c'est le fruit d'une passion ancestrale pour les saveurs authentiques et les traditions culinaires sénégalaises.</p>
        <p>Fondée il y a [nombre d'années], l'Auberge des Saveurs est le résultat du rêve d'Ahmed Diouf, un chef local passionné par l'art de cuisiner. Inspiré par les recettes transmises de génération en génération et le riche patrimoine culinaire de Dakar, Ahmed a créé un lieu où chaque plat raconte une histoire, où chaque saveur évoque un souvenir et où chaque visiteur est accueilli comme un membre de la famille.</p>
        <p>Notre restaurant est ancré dans la communauté, travaillant en étroite collaboration avec les pêcheurs locaux, les agriculteurs et les artisans pour garantir des ingrédients d'une fraîcheur incomparable et soutenir l'économie locale.</p>
        <p>À l'Auberge des Saveurs, chaque repas est une célébration de la culture sénégalaise, de ses épices envoûtantes à ses plats emblématiques. Que vous soyez un voyageur curieux en quête de découvertes culinaires ou un habitant cherchant à retrouver les saveurs de votre enfance, notre restaurant vous invite à un voyage gustatif inoubliable.</p>
        <p>Rejoignez-nous pour un festin de saveurs authentiques, un instant de partage et de convivialité, et laissez-vous envoûter par l'âme de l'Auberge des Saveurs, où chaque bouchée est un voyage au cœur de la culture sénégalaise.</p>
    </div>
    <a href="#" class="btn" id="aboutMoreBtn">En savoir plus</a>
</section>

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
    <footer>
        <p>&copy; 2024 L'Auberge Des Saveurs. Tous droits réservés.</p>
        <ul class="social-links">
            <li><a href="#"><img src="img/icons8-snapchat-50 (1).png" alt="snapchat"></a></li>
            <li><a href="#"><img src="img/icons8-instagram-50 (1).png" alt="Instagram"></a></li>
            <li><a href="#"><img src="img/icons8-twitter-50.png" alt="Twitter"></a></li>
        </ul>
    </footer>

    <!-- Modal structure for image gallery -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

    <!-- Modale de connexion et de création de compte -->
    <div id="authModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content">
            <h2>Connexion</h2>
            <form action="db.php" method="post">
            <form id="loginForm">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit" id="loginBtn" disabled>Se connecter</button>
</form>




            <form id="registerForm" style="display: none;">
    <label for="newFirstName">Prénom:</label>
    <input type="text" id="newFirstName" name="firstname" pattern="[A-Za-zÀ-ÿ\s-]+" title="Veuillez saisir un prénom valide (lettres uniquement)" required maxlength="50">
    <label for="newLastName">Nom:</label>
    <input type="text" id="newLastName" name="lastname" pattern="[A-Za-zÀ-ÿ\s-]+" title="Veuillez saisir un nom valide (lettres uniquement)" required maxlength="50">
    <label for="newAddress">Adresse:</label>
    <input type="text" id="newAddress" name="address" required maxlength="100">
    <label for="newEmail">Email:</label>
    <input type="email" id="newEmail" name="email" required>
    <label for="newPassword">Mot de passe:</label>
    <input type="password" id="newPassword" name="password" required minlength="8">
    <button type="submit">Créer un compte</button>
</form>

            <button id="toggleForm">Créer un Compte</button>
        </div>
    </div>

    <?php
// Vérifier si le formulaire d'inscription a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["inscription"])) {
    // Récupérer les valeurs du formulaire d'inscription
    $Nom = $_POST["Nom"];
    $Prenom = $_POST["Prenom"];
    $Adresse_Email = $_POST["Adresse_Email"];
    $MotDePasse = $_POST["MotDePasse"];

    // Insérer les informations dans la base de données
    $sql = "INSERT INTO utilisateurs (Nom, Prenom, Adresse_Email, MotDePasse) VALUES ('$Nom', '$Prenom', '$Adresse_Email', '$MotDePasse')";
    if ($connexion->query($sql) === TRUE) {
        echo "Inscription réussie!";
        // Rediriger l'utilisateur vers une page de connexion, un tableau de bord, etc.
    } else {
        echo "Erreur lors de l'inscription: " . $connexion->error;
    }
}
?>



    <script>
        // Navigation dynamic highlight
        window.addEventListener('scroll', () => {
            let sections = document.querySelectorAll('section');
            let navLinks = document.querySelectorAll('nav ul li a');
            
            sections.forEach(section => {
                let top = window.scrollY;
                let offset = section.offsetTop - 150;
                let height = section.offsetHeight;
                let id = section.getAttribute('id');
                
                if (top >= offset && top < offset + height) {
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        document.querySelector('nav ul li a[href*=' + id + ']').classList.add('active');
                    });
                }
            });
        });

        // Image gallery modal
        var modal = document.getElementById("myModal");
        var images = document.querySelectorAll('.widget img');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");

        images.forEach(img => {
            img.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }
        });

        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() {
            modal.style.display = "none";
        }

        // Script pour gérer les modales
        document.addEventListener("DOMContentLoaded", function() {
            var reserveTableBtn = document.getElementById("reserveTableBtn");
            var authModal = document.getElementById("authModal");
            var aboutMoreBtn = document.querySelector("#about .btn");
            var descriptionModal = document.getElementById("descriptionModal");
            var closeBtns = document.querySelectorAll(".close");
            var toggleFormBtn = document.getElementById("toggleForm");
            var loginForm = document.getElementById("loginForm");
            var registerForm = document.getElementById("registerForm");

            // Fonction pour ouvrir une modale
            function openModal(modal) {
                modal.style.display = "block";
            }

            // Fonction pour fermer une modale
            function closeModal(modal) {
                modal.style.display = "none";
            }

            // Événement pour le bouton de réservation
            reserveTableBtn.addEventListener("click", function(event) {
                event.preventDefault();
                openModal(authModal);
            });

            // Événement pour le bouton À propos
            if (aboutMoreBtn) {
                aboutMoreBtn.addEventListener("click", function(event) {
                    event.preventDefault();
                    openModal(descriptionModal);
                });
            }

            // Événement pour les boutons de fermeture de la modale
            closeBtns.forEach(function(btn) {
                btn.addEventListener("click", function() {
                    closeModal(btn.closest('.modal'));
                });
            });

            // Événement pour le bouton de basculement entre les formulaires
            toggleFormBtn.addEventListener("click", function() {
                if (loginForm.style.display === "none") {
                    loginForm.style.display = "block";
                    registerForm.style.display = "none";
                    toggleFormBtn.textContent = "Créer un Compte";
                } else {
                    loginForm.style.display = "none";
                    registerForm.style.display = "block";
                    toggleFormBtn.textContent = "Se connecter";
                }
            });

            // Fermer la modale si l'utilisateur clique en dehors du contenu
            window.addEventListener("click", function(event) {
                if (event.target == authModal) {
                    closeModal(authModal);
                }
                if (event.target == descriptionModal) {
                    closeModal(descriptionModal);
                }
            });
        });
        document.getElementById("aboutMoreBtn").addEventListener("click", function() {
    var aboutText = document.getElementById("aboutText");
    aboutText.classList.toggle("hidden");
    if (aboutText.classList.contains("hidden")) {
        document.getElementById("aboutMoreBtn").innerHTML = "En savoir plus";
    } else {
        document.getElementById("aboutMoreBtn").innerHTML = "Réduire";
    }
});

document.addEventListener("DOMContentLoaded", function() {
    var loginBtn = document.getElementById("loginBtn");
    var loginEmail = document.getElementById("email");
    var loginPassword = document.getElementById("password");
    var registerBtn = document.querySelector("#registerForm button[type='submit']");
    var registerEmail = document.getElementById("newEmail");
    var registerPassword = document.getElementById("newPassword");

    // Validation du formulaire de connexion
    loginEmail.addEventListener("input", function() {
        validateLoginForm();
    });

    loginPassword.addEventListener("input", function() {
        validateLoginForm();
    });

    function validateLoginForm() {
        if (loginEmail.validity.valid && loginPassword.validity.valid) {
            loginBtn.disabled = false;
        } else {
            loginBtn.disabled = true;
        }
    }

    // Validation du formulaire d'inscription
    registerEmail.addEventListener("input", function() {
        validateRegisterForm();
    });

    registerPassword.addEventListener("input", function() {
        validateRegisterForm();
    });

    function validateRegisterForm() {
        if (registerEmail.validity.valid && registerPassword.validity.valid) {
            registerBtn.disabled = false;
        } else {
            registerBtn.disabled = true;
        }
    }

    // Basculer entre les formulaires de connexion et d'inscription
    var toggleFormBtn = document.getElementById("toggleForm");
    toggleFormBtn.addEventListener("click", function() {
        var loginForm = document.getElementById("loginForm");
        var registerForm = document.getElementById("registerForm");

        if (loginForm.style.display === "none") {
            loginForm.style.display = "block";
            registerForm.style.display = "none";
            toggleFormBtn.textContent = "Créer un Compte";
        } else {
            loginForm.style.display = "none";
            registerForm.style.display = "block";
            toggleFormBtn.textContent = "Se connecter";
        }

        // Réinitialiser les boutons de soumission lors du basculement des formulaires
        loginBtn.disabled = true;
        registerBtn.disabled = true;
    });

    // Gérer le clic sur le bouton "Créer un Compte" sur le formulaire de connexion
    var createAccountBtn = document.getElementById("toggleForm");
    createAccountBtn.addEventListener("click", function() {
        var loginForm = document.getElementById("loginForm");
        var registerForm = document.getElementById("registerForm");

        loginForm.style.display = "none";
        registerForm.style.display = "block";
        toggleFormBtn.textContent = "Se connecter";
    
    // Gérer le clic sur le bouton "Se connecter" sur le formulaire d'inscription
var loginBtnInRegisterForm = document.getElementById("toggleForm");
loginBtnInRegisterForm.addEventListener("click", function() {
    var loginForm = document.getElementById("loginForm");
    var registerForm = document.getElementById("registerForm");

    loginForm.style.display = "block";
    registerForm.style.display = "none";
    toggleFormBtn.textContent = "Créer un Compte";

    // Réinitialiser les boutons de soumission lors du basculement des formulaires
    loginBtn.disabled = true;
    registerBtn.disabled = true;
});


        // Réinitialiser les boutons de soumission lors du basculement des formulaires
        loginBtn.disabled = true;
        registerBtn.disabled = true;
    });
});







    </script>
</body>
</html>
