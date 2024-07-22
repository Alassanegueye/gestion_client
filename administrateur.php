<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Auberge Des Saveurs</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="shortcut icon" href="img/ico-32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <nav class="main-nav">
            <img src="img/ico-32.png" alt="Logo du Restaurant">
            <ul class="nav-list">
                <li><a href="accueil2.php">Accueil</a></li>
                <li><a href="menu2.php">Menu</a></li>
                <li><a href="construction.php">Contact</a></li>
                <li><a href="administrateur.php">Admin Dashboard</a></li>
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
        <a href="menu2.php" class="btn btn-primary">Voir le Menu</a>
        <a id="reserveTableBtn" href="construction.php" class="btn btn-secondary">Réserver une Table</a>
    </section>

    <main>
        <section class="admin-dashboard">
            <h1>Tableau de Bord de l'Administrateur</h1>
            <div class="admin-widgets">
                <div class="admin-widget">
                    <h2>Gérer le Menu</h2>
                    <p>Ajouter, modifier ou supprimer des éléments du menu.</p>
                    <button class="btn btn-primary" onclick="openModal('menuModal')">Gérer le Menu</button>
                </div>
                <div class="admin-widget">
                    <h2>Gérer les Réservations</h2>
                    <p>Consulter, approuver ou annuler des réservations de table.</p>
                    <button class="btn btn-primary" onclick="openModal('reservationsModal')">Gérer les Réservations</button>
                </div>
                <div class="admin-widget">
                    <h2>Gérer les Avis des Clients</h2>
                    <p>Lire et répondre aux avis des clients.</p>
                    <button class="btn btn-primary" onclick="openModal('reviewsModal')">Gérer les Avis</button>
                </div>
                <div class="admin-widget">
                    <h2>Mettre à jour les Informations de Contact</h2>
                    <p>Modifier les informations de contact et les horaires d'ouverture.</p>
                    <button class="btn btn-primary" onclick="openModal('contactModal')">Mettre à jour les Infos</button>
                </div>
                <div class="admin-widget">
                    <h2>Gérer les Utilisateurs</h2>
                    <p>Ajouter, modifier, supprimer des utilisateurs et gérer leurs rôles.</p>
                    <button class="btn btn-primary" onclick="openModal('usersModal')">Gérer les Utilisateurs</button>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 L'Auberge Des Saveurs. Tous droits réservés.</p>
        <ul class="social-links">
            <li><a href="#"><img src="img/icons8-snapchat-50 (1).png" alt="snapchat"></a></li>
            <li><a href="#"><img src="img/icons8-instagram-50 (1).png" alt="Instagram"></a></li>
            <li><a href="#"><img src="img/icons8-twitter-50.png" alt="Twitter"></a></li>
        </ul>
    </footer>

    <div id="menuModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('menuModal')">&times;</span>
            <h2>Gérer le Menu</h2>
            <p>Actions disponibles :</p>
            <ul>
                <li><a href="admin/add_menu_item.php" class="btn btn-primary">Ajouter un élément</a></li>
                <li><a href="admin/edit_menu_item.php" class="btn btn-secondary">Modifier un élément</a></li>
                <li><a href="admin/delete_menu_item.php" class="btn btn-danger">Supprimer un élément</a></li>
            </ul>
        </div>
    </div>

    <div id="reservationsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('reservationsModal')">&times;</span>
            <h2>Gérer les Réservations</h2>
            <p>Actions disponibles :</p>
            <ul>
                <li><a href="admin/view_reservations.php" class="btn btn-primary">Voir les réservations</a></li>
                <li><a href="admin/approve_reservation.php" class="btn btn-secondary">Approuver une réservation</a></li>
                <li><a href="admin/cancel_reservation.php" class="btn btn-danger">Annuler une réservation</a></li>
            </ul>
        </div>
    </div>

    <div id="reviewsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('reviewsModal')">&times;</span>
            <h2>Gérer les Avis des Clients</h2>
            <p>Actions disponibles :</p>
            <ul>
                <li><a href="admin/view_reviews.php" class="btn btn-primary">Voir les avis</a></li>
                <li><a href="admin/reply_review.php" class="btn btn-secondary">Répondre à un avis</a></li>
                <li><a href="admin/delete_review.php" class="btn btn-danger">Supprimer un avis</a></li>
            </ul>
        </div>
    </div>

    <div id="contactModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('contactModal')">&times;</span>
            <h2>Mettre à jour les Informations de Contact</h2>
            <p>Actions disponibles :</p>
            <ul>
                <li><a href="admin/update_contact_info.php" class="btn btn-primary">Mettre à jour les infos de contact</a></li>
                <li><a href="admin/update_hours.php" class="btn btn-secondary">Mettre à jour les horaires</a></li>
            </ul>
        </div>
    </div>

    <div id="usersModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('usersModal')">&times;</span>
            <h2>Gérer les Utilisateurs</h2>
            <p>Ajouter, modifier, supprimer des utilisateurs et gérer leurs rôles.</p>
            <ul>
                <li><a href="admin/add_users.php" class="btn btn-primary">Ajouter des Utilisateurs</a></li>
                <li><a href="admin/edit_user.php" class="btn btn-secondary">Modifier des Utilisateurs</a></li>
                <li><a href="admin/delete_users.php" class="btn btn-danger">Supprimer des Utilisateurs</a></li>
                <li><a href="admin/export_users.php" class="btn btn-primary">Exporter la liste en CSV / PDF</a></li>
                <li><a href="admin/promote_users.php" class="btn btn-primary">Promouvoir des Utilisateurs en Admin</a></li>
                <li><a href="admin/generate_report.php" class="btn btn-primary">Créer un Rapport sur les Clients</a></li>
            </ul>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        window.onclick = function(event) {
            var modals = document.getElementsByClassName('modal');
            for (var i = 0; i < modals.length; i++) {
                if (event.target == modals[i]) {
                    modals[i].style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>
