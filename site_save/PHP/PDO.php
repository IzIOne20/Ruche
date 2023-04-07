<?php 
/************************************Partie Connexion BDD*************************************/
$addServeur = '135.125.103.133'; // adresse ip du serveur web

$dbname = 'ruche'; // nom de la base

$user = 'ruche'; // login de l'utilisateur de la BDD

$mdpBDD = 'btssnirRUCHE'; // mot de passe de l'utilisateur de la BDD

$bdd = new PDO("mysql:host=$addServeur;dbname=$dbname", $user, $mdpBDD); // connexion à la BDD (méthode PDO pour "multi-plateforme")

/************************************ FIN Partie Connexion BDD*********************************/
?>