<?php
    require '../db.php';
    session_start();
    $erreur = " ";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['Login']) AND isset($_POST['Pass'])) { 
            if (!empty($_POST['Login']) AND !empty($_POST['Pass'])) {
                
                $Login = htmlspecialchars($_POST['Login']);
                $Pass = htmlspecialchars($_POST['Pass']);

                if($Login == "Admin" && $Pass == "Horry!1234Bord" ) {

                    $_SESSION["Login"] = $Login;
                    $_SESSION["mdp"] = $mdp;

                    header("location:admin.php");
                    
                } else {
                    $erreur = "Nom d'utilisateur ou mot de passe incorrecte";
                }
            }
        } else {
            $erreur = "Erreur, L'identifiant ou le mot de passe n'eswt pas complété";
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="style_admin.css">
        <title>Horry Bord - Connexion</title>
    </head>
    <body>
        <?php require '../Require_php/Illustration_header.php'; ?><!--header-->
        <!-- mennu -->
        <div class="content">
            <div class="fichecontact">
                <h3 class="titrecont">Page admin</h3>
                <form class="formcont" method="POST">
                    <div class="form-group">
                        <p> Seul l'administrateur aura les codes de connexion. Si ces code sont perdu, il sera impossible de les récupérer  </p>
                        <?= $erreur ?>
                        <label for="Login">Identifiant :</label>
                        <input type="text" name="Login" class="form-control" placeholder="Identifiant" maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <label for="Pass">Mot de passe :</label>
                        <input type="password" name="Pass" class="form-control" placeholder="Mot de passe" maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <button type="envoyer" value="ok"class="">Connexion</button>
                    </div>
                </form>
            </div>
            <div class="barlat">
                <?php require '../Require_php/barlat.php'; ?>
            </div>
        </div>
        <?php require '../Require_php/footer.php'; ?>
    </body>
</html>
