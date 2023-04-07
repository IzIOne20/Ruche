<?php
session_start();

// Connexion à la base de données
require_once("PDO.php");

if(isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];
    $numTel = $_POST['numTel'];
    
    $idApiculteur = $_SESSION['idApiculteur'];

    $insertMbr = $bdd->prepare("INSERT INTO membre(nom, prenom, mel, identifiant, mdp, numTelephone, role, idTuteur) VALUES(?,?,?,?,?,?,'Stagiaire',?)");
    $insertMbr->execute(array($nom, $prenom, $email, $identifiant, $password, $numTel, $idApiculteur));  // on insère les champs du form récupérer en php dans la BDD
    header('Location: accueilApi.php');
    exit;
    
} else {
    echo "Erreur lors de l'execution du formulaire";
}
?>