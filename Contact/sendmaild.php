<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$objet = $_POST['objet'];
$message = $_POST['message'];
$destinataire = 'horry.bord@gmail.com';

$sujet = '=?UTF-8?B?'.base64_encode($sujet).'?=';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .='Content-Transfer-Encoding: 8bit'."\r\n" ;
$headers .= "From: $email" . "\r\n" . "Reply-To:$email" . "\r\n";
$message =  "Voici le méssage de $nom : <br>   $message ";
if(!mail("webmaster@tutovisuel.com", $sujet, $message, $headers)){
    echo "erreur";
}else{
    header("location:confirm.php");
}
?>