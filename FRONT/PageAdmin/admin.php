<?php
  $message_envoye = " ";
  $message_non_envoye = " ";
  $message_erreur_formulaire = " ";

  session_start();

  if($_SESSION["Login"] == "Admin" && $_SESSION["mdp"]="Horry!1234Bord" ) {
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
  }
  else{
    header("location:index.php");
  }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
    <link rel="icon" href="../images/favicon.ico" />
    <script src="../script_global.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Panneau de controle - Horry'Bord</title>
</head>
<body>
    <?php require '../Require_php/Illustration_header.php'; ?><!--header-->
    <?php require '../Require_php/barnav.php'; ?><!--navbar-->
    <!-- mennu -->
    <a href="logout.php"> Me déconnecter </a>
    <div class="content">
        <div class="fichecontact">
            <div class="vignetteadmin">
                <a href="" style="text-decoration: none;"><p class="titrevignadm">Articles</p></a>
                <div class="sepvignadm"></div>
                <div class="btnvignadm">
                    <a href="" style="text-decoration: none;"><div class="addvignadm"><p>Voir</p></div></a>
                    <a href="" style="text-decoration: none;"><div class="ajtvignadm"><p>Ajouter</p></div></a>
                </div>
            </div>
            <div class="vignetteadmin">
                <a href="" style="text-decoration: none;"><p class="titrevignadm">Utilisateurs</p></a>
                <div class="sepvignadm"></div>
                <div class="btnvignadm">
                    <a href="" style="text-decoration: none;"><div class="addvignadm"><p>Voir</p></div></a>
                    <a href="" style="text-decoration: none;"><div class="ajtvignadm"><p>Ajouter</p></div></a>
                </div>
            </div>
            <div class="vignetteadmin">
                <a href="" style="text-decoration: none;"><p class="titrevignadm">Commentaires</p></a>
                <div class="sepvignadm"></div>
                <div class="btnvignadm">
                    <a href="" style="text-decoration: none;"><div class="addvignadm"><p>Voir</p></div></a>
                    <a href="" style="text-decoration: none;"><div class="ajtvignadm"><p>Ajouter</p></div></a>
                </div>
            </div>
            <div class="vignetteadmin">
                <a href="" style="text-decoration: none;"><p class="titrevignadm">Mots clés</p></a>
                <div class="sepvignadm"></div>
                <div class="btnvignadm">
                    <a href="" style="text-decoration: none;"><div class="addvignadm"><p>Voir</p></div></a>
                    <a href="" style="text-decoration: none;"><div class="ajtvignadm"><p>Ajouter</p></div></a>
                </div>
            </div>
            <div class="vignetteadmin">
                <a href="" style="text-decoration: none;"><p class="titrevignadm">Thématiques</p></a>
                <div class="sepvignadm"></div>
                <div class="btnvignadm">
                    <a href="" style="text-decoration: none;"><div class="addvignadm"><p>Voir</p></div></a>
                    <a href="" style="text-decoration: none;"><div class="ajtvignadm"><p>Ajouter</p></div></a>
                </div>
            </div>
            <div class="vignetteadmin">
                <a href="" style="text-decoration: none;"><p class="titrevignadm">Langues</p></a>
                <div class="sepvignadm"></div>
                <div class="btnvignadm">
                    <a href="" style="text-decoration: none;"><div class="addvignadm"><p>Voir</p></div></a>
                    <a href="" style="text-decoration: none;"><div class="ajtvignadm"><p>Ajouter</p></div></a>
                </div>
            </div>
            <div class="vignetteadmin">
                <a href="" style="text-decoration: none;"><p class="titrevignadm">Angles</p></a>
                <div class="sepvignadm"></div>
                <div class="btnvignadm">
                    <a href="" style="text-decoration: none;"><div class="addvignadm"><p>Voir</p></div></a>
                    <a href="" style="text-decoration: none;"><div class="ajtvignadm"><p>Ajouter</p></div></a>
                </div>
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