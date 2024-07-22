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