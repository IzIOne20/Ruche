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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Accueil</title>
</head>
<body>
    <header class="hautPage">
        <nav>
            <ul>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Administrateur') { ?>
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="detailsRuches.php">Voir les ruches</a></li>
                <li><a href="detailsMembres.php">Voir les membres</a></li>
                <li><a href="detailsVisiteurs.php">Voir les visiteurs</a></li>
                <?php } ?>

                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Apiculteur') { ?>
                    <li><a href="accueil.php">Accueil</a></li>
                    <li><a href="detailsRuches.php">Voir les ruches</a></li>
                    <li><a href="detailsVisiteurs.php">Voir les visiteurs</a></li>
                <?php } ?>

                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Visiteur') { ?>
                    <li><a href="accueil.php">Accueil</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>

    <h1>Bienvenue page d'accueil</h1>
    <br>
    <p>Profil de <?php echo $_SESSION['identifiant']. " Tu es un ". $_SESSION['role']; ?></p>
    <br>
    <a id="btnDeco" onclick="confirmationdeconnexion()">Se déconnecter</a>
    

    <script src="../JS/SA.js"></script>
</body>
</html>