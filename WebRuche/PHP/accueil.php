<?php
session_start();

require_once("PDO.php");

if(!isset($_SESSION['identifiant']) AND !isset($_SESSION['mdp'])) // test si les champs identifiant et mp sont remplis sinon on ne peut pas accéder à la page
{
    header('Location: ../index.html'); // redirection sur la page d'accueil
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleAccueil.css">
    <!-- ajout d'une icone de site web -->
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon" />
    <!-- police du site -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Accueil</title>
</head>
<body>
    <header class="hautPage">

        <div class="menuNav">
        ¨   <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Administrateur') { ?>
                <a class="btnNav" href="accueil.php">Accueil</a></li>
                <a class="btnNav" href="detailsRuches.php">Voir les ruches</a>
                <a class="btnNav" href="detailsMembres.php">Voir les membres</a>
                <a class="btnNav" href="detailsVisiteurs.php">Voir les visiteurs</a>
            <?php } ?>
            
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Apiculteur') { ?>
                <a class="btnNav2" href="accueil.php">Accueil</a>
                <a class="btnNav2" href="detailsRuches.php">Voir les ruches</a>
                <a class="btnNav2" href="detailsVisiteurs.php">Voir les visiteurs</a>
            <?php } ?>

            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Visiteur') { ?>
                    <a class="btnNav3" href="accueil.php">Accueil</a>
            <?php } ?>
        </div>

        <div>
            <button id="btnDeco" onclick="confirmationdeconnexion()">Se déconnecter</button>
        </div>
        
    </header>

    <br>
    <p>Profil de <?php echo $_SESSION['identifiant']. " Tu es un ". $_SESSION['role']; ?></p>
    
    <script src="../JS/SA.js"></script>

</body>
</html>