<?php
session_start(); // on démarre les sessions

require_once("PDO.php"); // on inclue le fichier de connexion à la BDD

if($_SESSION['role'] == 'Apiculteur' || $_SESSION['role'] == 'Visiteur') // si c'est un apiculteur ou un visiteur il ne peut pas voir la page
{
    header('Location: accueil.php'); // redirection sur la page d'accueil
    exit;
} 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- on inclue le fichier de style du tableau pour les utilisateurs -->
    <link rel="stylesheet" href="../CSS/styleTableauUser.css">
    <!-- ajout d'une icone de site web -->
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon" />
    <!-- police du site -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet"/>
    <!-- on inclue la librairie font awesome pour les icones -->
    <script src="https://kit.fontawesome.com/3fc2be6b13.js" crossorigin="anonymous"></script>
    <!-- on inclue la librairie sweet alert pour les alertes dynamiques -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Détails Membres</title>
</head>

<body>

    <h3>Gestion des utilisateurs</h3>
    <a href="accueil.php">Retour</a>
    <a href="formIns.php">Ajouter un membre</a>

    <?php 
    $sql = "SELECT idMembre, nom, prenom, mel, identifiant, numTelephone, role FROM membre"; // requête pour récupérer tous les utilisateurs présent dans la BDD
    $stmt = $bdd->prepare($sql); // préparation de la requête avec les paramètre qui doivent être remplacés
    $stmt->execute(); // éxécution de la requête avec les valeurs correspondantes

    $utilisateurs = $stmt->fetchAll(); // on récupère toutes les lignes du résultat de la requête et on les stocke dans un tableau $utilisateurs
    ?>
    <!-- structure du tableau qui affiche les utilisateurs -->
    <div class="tab">
        <table>
            <!-- haut du tableau avec une ligne qui coorespond aux en-têtes de chaque colonnes  -->
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>identifiant</th>
                    <th>Numéro</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- boucle foreach qui parcourt le tableau $utilisateurs et qui stocke chaque éléments dans la variable $utilisateur -->
                <?php foreach($utilisateurs as $utilisateur) { ?> 
                <tr>
                    <td><?= $utilisateur['nom']; ?></td>
                    <td><?php echo $utilisateur['prenom']; ?></td>
                    <td><?php echo $utilisateur['mel']; ?></td>
                    <td><?php echo $utilisateur['identifiant']; ?></td>
                    <td><?php echo $utilisateur['numTelephone']; ?></td>
                    <td><?php echo $utilisateur['role']; ?></td>
                    <td>
                        <!--this pour dire que l'on passe le formulaire en paramètre de la fonction JS-->
                        <!--retourne la valeur par défaut de formValide(false = empêche le formulaire de s'éxécuter)-->
                        <form method="post" onsubmit="confirmationSupprUser(this); return formValide;" action="supprimer.php">
                            <input type="hidden" name="idMembre" value="<?= $utilisateur['idMembre'] ?>">
                            <button type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- on inclue le script JS associer à la page -->
    <script src="../JS/SA.js" type="text/javascript"></script>
</body>
</html>