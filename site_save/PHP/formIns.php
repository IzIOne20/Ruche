<?php
session_start(); // on démarre les sessions

require_once("PDO.php"); // pn inclue le fichier de connexion à la BDD

if($_SESSION['role'] == 'Apiculteur' || $_SESSION['role'] == 'Visiteur') // si c'est un apiculteur ou un visiteur il ne peut pas voir la page
{
    header('Location: accueil.php'); // redirection sur la page d'accueil
    exit;
} 

?>

<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ajout d'une icone de site web -->
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon" />
    <!-- ajout du style du formulaire -->
    <link rel="stylesheet" href="../CSS/styleFormAjoutAdmin.css" />
    <!-- ajout de la librairie font awesome pour ajouter des icônes -->
    <script src="https://kit.fontawesome.com/3fc2be6b13.js"crossorigin="anonymous"></script>
    <!-- ajout de la police du site -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet"/>
    <title>Inscription</title>
  </head>

  <body>
    
    <form action="formAjoutAdmin.php" method="post" name="formAjoutAdmin" id="formAjoutAdmin">
        <i class="fa-solid fa-xmark" onclick="fermerForm()"></i>
        <br>
        <h2>Ajout d'un membre</h2>
        <br>
        <input type="text" placeholder="Nom" name="nom" id="nom">
        <input type="text" placeholder="Prenom" name="prenom" id="prenom">
        <input type="email" placeholder="Adresse mail" name="mail" id="mail">
        <input type="tel" placeholder="Numéro de téléphone" name="numTel" id="numTel">
        <input type="text" placeholder="Identifiant" name="identifiant" id="identifiant">
        <input type="password" placeholder="Mot de passe" name="mdp" id="mdp">
        <input type="password" placeholder="Confirmer le mot de passe" name="mdp2" id="mdp2">
        <div class="btnRadio"> <!--Il faut que les boutons radios aient le même nom pour forcer un cocher-->
            <input type="radio" name="btnRadio" id="admin" value="Administrateur" checked> <label for="admin">Administrateur</label>
            <input type="radio" name="btnRadio" id="user" value="Apiculteur"> <label for="user">Apiculteur</label>
            <input type="radio" name="btnRadio" id="visit" value="Visiteur"> <label for="visit">Visiteur</label>
        </div>

        <label for="role">Rôle :</label>
        <select id="role" name="role">
          <option value="Administrateur">Administrateur</option>
          <option value="Apiculteur">Apiculteur</option>
          <option value="Stagiaire">Stagiaire</option>
        </select>

        <button type="submit" name="btnCo" id="btnCo">Ajouter le membre</button>
        
    </form>

    <script src="./JS/form.js"></script>
  </body>
</html>
