<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un stagiaire</title>
</head>
<body>
    <h1>Ajout d'un stagiaire</h1>

    <form method="POST" action="formApi.php">

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br>

    <label for="password">Prénom :</label>
    <input type="text" id="password" name="prenom" required><br>

    <label for="email">email :</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Identifiant :</label>
    <input type="text" id="password" name="identifiant" required><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br>

    <label for="password">Numéro de téléphone :</label>
    <input type="text" id="password" name="numTel" required><br>

    <input type="submit" name="submit" value="Ajouter">

    </form>

</body>
</html>