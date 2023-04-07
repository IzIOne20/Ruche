<?php
session_start(); // on démarre les sessions

$_SESSION = array(); // on récupère les sessions active dans un tableau

session_destroy(); // on détruit la sessions en cours de l'utilisateur

header("Location: ../index.html"); // une fois que tout est éffectuer on redirige vers la page d'accueil

?>