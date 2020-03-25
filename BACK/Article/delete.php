<?php
require '../db.php'; // Importation du fichier db.php
$id = $_GET['id']; // On met On récupère id et le met dans une variable
echo $id; // affichage de $id
$sql = 'DELETE FROM article WHERE NumArt=:id'; // On prépare la suppréssion de la table langue ou Numlang=$id
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) { // On execute et on redirige vers index.php
  header("Location: index.php");
}