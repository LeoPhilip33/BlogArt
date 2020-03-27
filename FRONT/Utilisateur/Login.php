<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="stylesheet.css">
        <title>Horry Bord - Connexion</title>
    </head>
    <body>
        <?php require '../Require_php/Illustration_header.php'; ?><!--header-->
        <?php require '../Require_php/barnav.php'; ?><!--navbar-->
        <!-- mennu -->
        <div class="content">
            <div class="fichecontact">
                <h3 class="titrecont">Connexion</h3>
                <form class="formcont" method="POST">
                    <div class="form-group">
                        <p>Si la terreur ne te fais pas peur… Connecte-toi ! </p>
                        <label for="email">Identifiant :</label>
                        <input type="email" name="email" class="form-control" placeholder="Adresse Email" maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <label for="objet">Mot de passe :</label>
                        <input type="text" name="objet" class="form-control" placeholder="Mot de passe" maxlength="45" required>
                        <span class="mpdoublie" > Mot de passe oublié ? </span>
                    </div>
                    <div class="form-group">
                        <button type="envoyer" value="ok"class="">Connexion</button>
                    </div>
                    <p > <a href="" class="pasdecompte"> Vous n'avez pas de compte ? Inscription </a> </p>
                </form>
                <?php 
                    if(isset($error)){
                        echo $error;
                    }
                ?>
            </div>
            <div class="barlat">
                <?php require '../Require_php/barlat.php'; ?>
            </div>
        </div>
        <?php require '../Require_php/footer.php'; ?>
    </body>
</html>

<?php
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
