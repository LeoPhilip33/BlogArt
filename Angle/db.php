<?php
$dsn = 'mysql:host=localhost;dbname=blogart20'; // Met ou est heberger la BDD + donne le nom de la BDD
$username = 'root'; // Met l'user dans une varaible
$password = ''; // Met le MDP dans une variable
try {
    $connection = new PDO($dsn, $username, $password); // On donne id et mdp pour se connecter
}
catch(PDOException $e) {

}