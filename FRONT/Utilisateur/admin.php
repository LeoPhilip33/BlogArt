<?php
  $message_envoye = " ";
  $message_non_envoye = " ";
  $message_erreur_formulaire = " ";

  session_start();

  if($_SESSION["Login"] == "Admin" && $_SESSION["mdp"]="Horry!1234Bord" ) {

  }
  else{
    header("location:login.php");
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
    <title>Panneau de controle</title>
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