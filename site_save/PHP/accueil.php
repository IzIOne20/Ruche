<?php
session_start(); //  on démarre les sessions pour récupérer les infos utilisateurs

require_once("PDO.php"); // on inclue le fichier de connexion à la BDD

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
    <link rel="stylesheet" href="../CSS/leaf.css" />
    <link rel="stylesheet" href="../CSS/graph.css">
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

<link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
      integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
      crossorigin=""
/>
    <!-- ajout de la librairie leafLet pour la carte -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Accueil</title>
</head>
<body>
    <!-- haut de la page d'accueil -->
    <header class="hautPage">
        <!-- Menu de navigation -->
        <div class="menuNav">
        ¨   <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Administrateur') { ?> <!-- si l'utilisateur est administrateur alors il verra : -->
                <a class="btnNav" href="accueil.php">Accueil</a></li>
                <a class="btnNav" href="detailsRuches.php">Voir les ruches</a>
                <a class="btnNav" href="detailsMembres.php">Voir les membres</a>
                <a class="btnNav" href="detailsVisiteurs.php">Voir les visiteurs</a>
            <?php } ?>
            
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Apiculteur') { ?> <!-- si l'utilisateur est apiculteur alors il verra : -->
                <a class="btnNav2" href="accueil.php">Accueil</a>
                <a class="btnNav2" href="detailsRuches.php">Voir les ruches</a>
                <a class="btnNav2" href="detailsVisiteurs.php">Voir les visiteurs</a>
            <?php } ?>

            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Visiteur') { ?> <!-- si l'utilisateur est visiteur alors il verra : -->
                    <a class="btnNav3" href="accueil.php">Accueil</a>
            <?php } ?>
        </div>

        <div>
            <button id="btnDeco" onclick="confirmationdeconnexion()">Se déconnecter</button> <!-- bouton se déconnecter -->
        </div>
        
    </header>

    <br>
    <p>Profil de <?php echo $_SESSION['identifiant']. " Tu es un ". $_SESSION['role']; ?></p> <!-- on affiche le nom de l'utilisateur et son rôle -->

    <div id="map"></div> <!-- div qui contient la carte -->

    <div id="graph">
        <canvas id="myChart"></canvas>
    </div>

    <!-- Ajout des fichiers JS associer -->
    <script src="../JS/SA.js"></script>
    <script src="../JS/map.js"></script>
    <script src="../JS/graph.js"></script>

</body>
</html>