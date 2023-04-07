<?php
session_start(); // on démarre les sessions

require_once("PDO.php"); // on inclue le fichier de connexion à la BDD

if(isset($_POST['btnCo']))  // si le bouton "se connecter" est activé
{
    $identifiantConnect = $_POST['identifiant']; // on créer des variables pour l'identifiant et le mot de passe
    $mdpConnect = $_POST['mdp'];

    if(!empty($identifiantConnect) AND !empty($mdpConnect)) // si les champs ne sont pas vides alors
    {
        $requser = $bdd->prepare("SELECT * FROM membre WHERE identifiant = ? AND mdp = ?"); // on sélectionne dans la BDD si les champs rentrés sont correct
        $requser->execute(array($identifiantConnect, $mdpConnect)); // on éxécute la requête préparer
        $userexist = $requser->rowcount(); // on compte les lignes pour voir si l'utilisateur existe
        
        if($userexist == 1) // si l'utilisateur existe alors
        {
            $userinfo = $requser->fetch(); // fontion pour récupérer les lignes de la requête préparée
            $_SESSION['identifiant'] = $userinfo['identifiant']; // création des sessions pour les réutilisées
            $_SESSION['mdp'] = $userinfo['mdp'];
            $_SESSION['role'] = $userinfo['role'];
            if($userinfo['role'] == 'Apiculteur') {                 // on créer une condition si l'utilisateur connecté est un apiculteur alors on lui ajoute une session
                $_SESSION['idApiculteur'] = $userinfo['idMembre'];
            }
            header("Location: accueil.php");
            exit;
            
        } else {
            $message = "Identifiant ou mot de passe incorrect...";
        }

    } else {
        $message = "Tout les champs doivent être compléter...";
    }

}


if(isset($message))
{
    echo '<font color="red">'.$message.'</font>';  // on affiche le message
}

?>