<?php 
/************************************Partie Connexion BDD*************************************/
$addServeur = '127.0.0.1';
$dbname = 'ruchetemoin';
$user = 'root';
$mdpBDD = '';
$bdd = new PDO("mysql:host=$addServeur;dbname=$dbname", $user, $mdpBDD); // connexion à la BDD (méthode PDO pour "multi-plateforme")

/************************************ FIN Partie Connexion BDD*********************************/
?>