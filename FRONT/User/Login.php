<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="stylesheet.css">
        <title>Horry Bord - Connexion</title>
    </head>
    <body>
        <img src="../images/Illustration_header.jpg" alt="Image header" />
    </body>
</html>

<?php
    session_start();
    require '../../db.php';

    if (isset($_POST['confirm_login'])) {
        if(isset($_POST['Login']) AND isset($_POST['Pass'])) { 
            if (!empty($_POST['Login']) AND !empty($_POST['Pass'])) {
                
                $Login = htmlspecialchars($_POST['Login']);
                $Pass = htmlspecialchars($_POST['Pass']);

                $req = $connection->prepare("SELECT * FROM user WHERE Login = ? AND Pass = ?");
                $req->execute(array($Login, $Pass));

                if($req->rowCount() == 1) {
                    $user = $req->fetch();
                    $_SESSION['user'] = $user;
                    
                    die('Bonjour '.$_SESSION['user']['Login']);
                    
                } else {
                    $erreur = "Nom d'utilisateur ou mot de passe incorrecte";
                    echo $erreur;
                }
            }
        } else {
            $erreur = "Erreur, L'identifiant ou le mot de passe n'eswt pas complété";
            echo $erreur;

        }
    }

?>
<form method="POST" >
    <label> Votre Login : </label>
    <input type="text" name="Login" maxlength="30" required>

    <label> Votre Mot de passe : </label>
    <input type="Password" name="Pass" maxlength="15" required>

    <button type ="submit" name="confirm_login"> Se connecter </button>
</form>
    <?php if(isset($error)){
        echo $error;
    }
    ?>