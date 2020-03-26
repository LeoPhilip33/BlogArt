<?php
  $message_envoye = " ";
  $message_non_envoye = " ";
  $message_erreur_formulaire = " ";

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $objet = $_POST['objet'];
    $message = $_POST['message'];
    /*
    ********************************************************************************************
    CONFIGURATION
    ********************************************************************************************
    */
    // destinataire est votre adresse mail. Pour envoyer ? plusieurs ? la fois, s?parez-les par une virgule
    $destinataire = 'horry.bord@gmail.com';

    // copie ? (envoie une copie au visiteur)
    $copie = 'oui'; // 'oui' ou 'non'

    /*
    ********************************************************************************************
    FIN DE LA CONFIGURATION
    ********************************************************************************************
    */

    // on teste si le formulaire a ?t? soumis
    if (isset($_POST['envoyer']))
    {
    // formulaire non envoy?
        $message_erreur_formulaire = "<p style='color:red;'> Vous devez d'abord envoyer le formulaire. </p>";
    }
    else
    {
    /*
        * cette fonction sert ? nettoyer et enregistrer un texte
        */
    function Rec($text)
    {
        $text = htmlspecialchars(trim($text), ENT_QUOTES);
        if (1 === get_magic_quotes_gpc()){
            $text = stripslashes($text);
        }

        $text = nl2br($text);
        return $text;
    };

    /*
        * Cette fonction sert ? v?rifier la syntaxe d'un email
        */
    function IsEmail($email)
    {
        $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
        return (($value === 0) || ($value === false)) ? false : true;
    }

    // formulaire envoy?, on r?cup?re tous les champs.
    $nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
    $prenom  = (isset($_POST['prenom']))  ? Rec($_POST['prenom'])  : '';
    $email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
    $objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
    $message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';

    // On va v?rifier les variables et l'email ...
    $email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erron?, soit il vaut l'email entr?

    if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
    {
        // les 4 variables sont remplies, on g?n?re puis envoie le mail
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From:'.$nom.' '.$prenom.' <'.$email.'>' . "\r\n" .
                'Reply-To:'.$email. "\r\n" .
                'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
                'Content-Disposition: inline'. "\r\n" .
                'Content-Transfer-Encoding: 7bit'." \r\n" .
                'X-Mailer:PHP/'.phpversion();

        // envoyer une copie au visiteur ?
        if ($copie == 'oui')
        {
            $cible = $destinataire.';'.$email;
        }
        else
        {
            $cible = $destinataire;
        };

        // Remplacement de certains caract?res sp?ciaux
        $caracteres_speciaux     = array('&#039;', '&#8217;', '&quot;', '<br>', '<br />', '&lt;', '&gt;', '&amp;', '?',   '&rsquo;', '&lsquo;');
        $caracteres_remplacement = array("'",      "'",        '"',      '',    '',       '<',    '>',    '&',     '...', '>>',      '<<'     );

        $objet = html_entity_decode($objet);
        $objet = str_replace($caracteres_speciaux, $caracteres_remplacement, $objet);

        $message = html_entity_decode($message);
        $message = str_replace($caracteres_speciaux, $caracteres_remplacement, $message);

        // Envoi du mail
        $num_emails = 0;
        $tmp = explode(';', $cible);
        foreach($tmp as $email_destinataire)
        {
          if (mail($email_destinataire, $objet, $message, $headers))
              $num_emails++;
        }

        if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
        {
            $message_envoye = "<p style='color:green;'> Votre message a bien été envoyé ! </p>";
        }
        else
        {
            $message_non_envoye = "<p style='color:red;> L'envoi du mail a échoué, veuillez réessayer. <p>";
        };
    }
    else
    {
        $message_formulaire_invalide = "<p style='color:red;'>Vérifier que tous les champs soient bien remplis et que l'email soit sans erreur. </p>";
    };
    }; // fin du if (!isset($_POST['envoi']))

  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
    <script src="../script_global.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Contact</title>
</head>
<body>
    <?php require '../Require_php/Illustration_header.php'; ?><!--header-->
    <?php require '../Require_php/barnav.php'; ?><!--navbar-->
    <!-- mennu -->
    <div class="content">
        <div class="fichecontact">
            <h3 class="titrecont">Contact</h3>
            <form class="formcont" method="POST">
                <p class="phrasecont">Si la terreur ne te fais pas peur… Contacte-nous!</p>
                <?= $message_envoye ?>
                <?= $message_non_envoye ?>
                <?= $$message_erreur_formulaire ?>
                <div class="form-row">
                  <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" class="form-control" placeholder="Nom" maxlength="25" required>
                  </div>
                  <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" name="prenom" class="form-control" placeholder="Prénom" maxlength="30" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" name="email" class="form-control" placeholder="Adresse Email" maxlength="45" required>
                </div>
                <div class="form-group">
                  <label for="objet">Objet:</label>
                  <input type="text" name="objet" class="form-control" placeholder="Objet" maxlength="45" required>
                </div>
                <div class="form-group">
                  <label for="message">Message:</label>
                  <textarea class="form-control" id="message" name="message" rows="5" placeholder="Votre message" required></textarea>
                </div>
                <div class="form-group">
                <button type="envoyer" value="ok"class="btn btn-primary">Envoyer</button>
                </div>
              </form>
              <div class="icons">
                <a href="https://twitter.com/BordHorry" target="_blank"> <img src="../images/twitter.png" class="icon" alt="Logo de twitter" > </a>
                <a href="https://medium.com/@horry.bord" target="_blank"> <img src="../images/medium.png" class="icon" alt="Logo de medium"> </a>
                <a href="https://www.instagram.com/horry_bord/" target="_blank"> <img src="../images/instagram.png" class="icon" alt="Logo d'instagram"> </a>
              </div>
        </div>
        <div class="barlat">
          <?php require '../Require_php/barlat.php'; ?>
        </div>
    </div>
    <!-- footer -->
    <?php require '../Require_php/footer.php'; ?>
</body>
</html>