<?php

require_once("PDO.php");


// Vérifier si l'ID est présent dans la requête POST
if(isset($_POST['idMembre'])) {
  // Récupérer l'ID de la ligne à supprimer
  $id = $_POST['idMembre'];
  
  // Supprimer la ligne correspondante dans la base de données
  $stmt = $bdd->prepare("DELETE FROM membre WHERE idMembre = ?");
  $stmt->execute([$id]);
  
  // Rediriger l'utilisateur vers la page d'origine
  header("Location: detailsMembres.php");
  exit();
}

?>