<?php

require_once("PDO.php");

/************************************Partie Test de validation du formulaire*************************************/

if(isset($_POST['btnCo'])) // si le bouton du formulaire html  est appuyé alors :
{
    $nom = $_POST['nom'];     // on récupére les inputs du form en php puis on les cryptes
    $prenom = $_POST['prenom'];
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);
    $telephone = $_POST['numTel'];
    $identifiant = $_POST['identifiant'];
    $radio = $_POST['btnRadio'];

    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['numTel']) AND !empty($_POST['identifiant']) AND !empty($_POST['mdp'])) // si aucun champs n'est vide
    {
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)) // sert à vérifier si le mail est un mail valide et au bon format (complète l'input mail)
        {
            $reqmail = $bdd->prepare("SELECT * FROM membre WHERE mel = ?"); // on prépare la requête (sélection de toutes les mails dans la table pour voir si il existe déjà)
            $reqmail->execute(array($mail));
            $mailexist = $reqmail->rowcount();  // on regarde sur les ligne de la BDD si le mail existe
            if($mailexist == 0)  // si le mail n'existe pas alors :
            {
                if($mdp == $mdp2) // si les mots de passes correspondent alors :
                {
                    $insertMbr = $bdd->prepare("INSERT INTO membre(nom, prenom, mel, identifiant, mdp, numTelephone, role) VALUES(?,?,?,?,?,?,?)");
                    $insertMbr->execute(array($nom, $prenom, $mail, $identifiant, $mdp, $telephone, $radio));  // on insère les champs du form récupérer en php dans la BDD
                    header('Location: detailsMembres.php');  
                    exit;
                } else {
                    $message = "Les mots de passe de correspondent pas...";
                }
            } else {
                $message = "Le mail existe déjà...";
            }
        } else {
            $message = "email non valide...";
        }
    } else {
        $message = "Tout les champs doivent-être compléter...";
    }
}

if(isset($message))
{
    echo '<font color="red">'.$message.'</font>';  // on affiche le message d'erreur
}

/************************************Partie Test de validation du formulaire*************************************/
?>
