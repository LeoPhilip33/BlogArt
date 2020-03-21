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
    <table>
        <tr>
            <td>
                <label> Votre Login : </label>
            </td>
            <td>
                <input type="text" name="Login">
            </td>
        </tr>
        <tr>
            <td>
                <label> Votre Mot de passe : </label>
            </td>
            <td>
                <input type="Password" name="Pass">
            </td>
        </tr>
        <tr>
            <td>
                
            </td>
            <td>
                <button type ="submit" name="confirm_login"> Se connecter </button>
            </td>
        </tr>
    </table>

</form>
    <?php if(isset($error)){
        echo $error;
    }
    ?>
