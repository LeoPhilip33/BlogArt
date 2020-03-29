<h1> Informations sur l'utilisateur </h1>
<?php
require '../db.php';

session_start();

if(!isset($_SESSION['user']['Login'])) {
    header("location:login.php");
}       
else{
    echo "Tu es bien connecté ". $_SESSION['user']['Login'];
}

?>