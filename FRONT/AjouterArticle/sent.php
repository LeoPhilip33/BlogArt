<?php
require '../db.php';
$NumAngl="";
$NumThem="";
$NumLang="";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../script_global.js"></script>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Rédiger Article</title>
</head>
    <body>
        <?php require '../Require_php/Illustration_header.php'; ?><!--header-->
        <?php require '../Require_php/barnav.php'; ?><!--navbar-->
        <div class="content">
        <div class="fichecontact">
        <h3 class="titrecont">Rédiger Article</h3>
            <div class="monformlaire">
        
            <p class="merci">Votre est article est en ligne!</p>
            <div class="form-group voirart">
                <?php $id = $_GET['id'];?>
                <button onclick="location.href='../ArticleType/index.php?id=<?= $id ?>'" type="button" class="btnsub">Voir l'article</button>
            </div>
        </div>



            <div class="icons">
            <a href="https://twitter.com/BordHorry" target="_blank"> <img src="../images/twitter.png" class="icon" alt="Logo de twitter" > </a>
            <a href="https://medium.com/@horry.bord" target="_blank"> <img src="../images/medium.png" class="icon" alt="Logo de medium"> </a>
            <a href="https://www.instagram.com/horry_bord/" target="_blank"> <img src="../images/instagram.png" class="icon" alt="Logo d'instagram"> </a>
            </div>
        </div>
        <div class="barlat"></div>
    </div>
        <?php require '../Require_php/footer.php'; ?>
    </body>
</html>
