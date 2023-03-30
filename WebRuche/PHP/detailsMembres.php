<?php
session_start();

require_once("PDO.php");

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
    <link rel="stylesheet" href="../CSS/styleTableauUser.css">
    <script src="https://kit.fontawesome.com/3fc2be6b13.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Détails Membres</title>
</head>
<body>
    <h3>Gestion des utilisateurs</h3>
    <a href="accueil.php">Retour</a>
    <a href="formIns.php">Ajouter un membre</a>

    <?php 
    
    $sql = "SELECT idMembre, nom, prenom, mel, identifiant, numTelephone, role FROM membre";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $utilisateurs = $stmt->fetchAll();

    ?>

    <div class="tab">
        <table>
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
    <script src="../JS/SA.js" type="text/javascript"></script>
</body>
</html>