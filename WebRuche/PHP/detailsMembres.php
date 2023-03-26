<?php
session_start();

require_once("PDO.php");

if($_SESSION['role'] == 'Apiculteur' || $_SESSION['role'] == 'Visiteur') // si c'est un apiculteur ou un visiteur il ne peut pas voir la page
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
    <link rel="stylesheet" href="../CSS/styleTableauUser.css">
    <script src="https://kit.fontawesome.com/3fc2be6b13.js" crossorigin="anonymous"></script>
    <title>Détails Membres</title>
</head>
<body>
    <h3>Gestion des utilisateurs</h3>
    <a href="accueil.php">Retour</a>
    <a href="../formIns.html">Ajouter un membre</a>

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
                </tr>
            </thead>
            <tbody>
                <?php foreach($utilisateurs as $utilisateur) { ?>
                    <tr>
                        <td><?php echo $utilisateur['nom']; ?></td>
                        <td><?php echo $utilisateur['prenom']; ?></td>
                        <td><?php echo $utilisateur['mel']; ?></td>
                        <td><?php echo $utilisateur['identifiant']; ?></td>
                        <td><?php echo $utilisateur['numTelephone']; ?></td>
                        <td><?php echo $utilisateur['role']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="test">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>identifiant</th>
                    <th>Numéro</th>
                    <th>Rôle</th>
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
                        <form method="post" action="supprimer.php">
                            <input type="hidden" name="idMembre" value="<?= $utilisateur['idMembre'] ?>">
                            <button type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>