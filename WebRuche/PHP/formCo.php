<?php
session_start();

require_once("PDO.php");

if(isset($_POST['btnCo']))
{
    $identifiantConnect = htmlspecialchars($_POST['identifiant']);
    $mdpConnect = sha1($_POST['mdp']);

    if(!empty($identifiantConnect) AND !empty($mdpConnect))
    {
        $requser = $bdd->prepare("SELECT * FROM membre WHERE identifiant = ? AND mdp = ?");
        $requser->execute(array($identifiantConnect, $mdpConnect));
        $userexist = $requser->rowcount();
        
        if($userexist == 1)
        {
            $userinfo = $requser->fetch(); // fontion pour récupérer les lignes de la requête préparée
            $_SESSION['identifiant'] = $userinfo['identifiant']; // création des sessions pour les réutilisées
            $_SESSION['mdp'] = $userinfo['mdp'];
            $_SESSION['role'] = $userinfo['role'];
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