<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="stylesheet.css">
        <title>Horry Bord - Connexion</title>
    </head>
    <body>
        <img src="../images/Illustration_header.jpg" alt="Image header">

        <div class = "inscription">
            <div class ="gauche_inscription">
                <h1> Connexion </h1>
                <p> Si la terreur ne te fais pas peur ... Connecte-toi ! </p>
                <div class="googlefacebook">
                    <div> <img class="img-connexion" src="../images/fb.png" alt="Image de facebook"> </div>
                    <div class="centerreseau" > Se conncter avec Facebook </div>
                </div>

                <div class="googlefacebook">
                    <div> <img class="img-connexion" src="../images/google.png" alt="Image de google"> </div>
                    <div class="centerreseau" > Se connecter avec Google </div>
                </div>

                OU

                <form method="POST" >
                    
                    <div class="gaucheconnexion">
                        <div><label> Identifiant</label></div>
                        <div><input type="text" name="Login" maxlength="30" required></div>
                        

                        <div><label> Mot de passe</label></div>
                        <div><input type="Password" name="Pass" maxlength="15" required></div>
                        
                        <div id="mdpoublie">
                            Mot de passe oublié ?
                        </div>

                        <button type ="submit" name="confirm_login"> Se connecter </button>

                        <div> 
                            <a href="#" > Vous n'avez pas de compte ? Inscription </a>
                        </div>
                    <div>
                </form>
                <?php if(isset($error)){
                    echo $error;
                }
                ?>

                <div class="droit_inscription">
                    <img class="connexionIMGhorror" src="../images/connexion.png" alt="Une image de zombie">
                </div>

            </div>
        </div>

    </body>
</html>

<?php
    session_start();
    require '../db.php';

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
