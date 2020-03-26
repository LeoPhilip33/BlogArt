<?php
    require '../db.php';
    $id = $_GET['id'];

    $sql = "SELECT * FROM article WHERE NumArt = '$id'";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $articles = $statement->fetch();

    $DtCreA = $articles['DtCreA'];
    $Likes = $articles['Likes'];
    $LibTitrA = $articles['LibTitrA'];
    $LibChapoA = $articles['LibChapoA'];
    $LibAccrochA = $articles['LibAccrochA'];
    $Parag1A = $articles['Parag1A'];
    $LibSsTitr1 = $articles['LibSsTitr1'];
    $Parag2A = $articles['Parag2A'];
    $LibSsTitr2 = $articles['LibSsTitr2'];
    $Parag3A = $articles['Parag3A'];
    $LibConclA = $articles['LibConclA'];
    $UrlPhotA = $articles['UrlPhotA'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../script_global.js"></script>
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Article Type</title>
</head>
    <body>
        <?php require '../Require_php/Illustration_header.php'; ?><!--header-->
        <?php require '../Require_php/barnav.php'; ?><!--navbar-->
        <div class="content">
        <div class="fichecontact">
            <?php //echo $_GET['id'];?>
            <h2 class="Titreart"><?= $LibTitrA ?></h2>
            <p class="descart"><?= $DtCreA ?> | Par *User*</p>
            <p class="chapo"><?= $LibChapoA ?></p>
            <div class="imgart" style="background-image: url('<?= $UrlPhotA?>');"></div>
            <p class="accrocheart"><?= $LibAccrochA ?></p>
            <p class="para1"><?= $Parag1A ?></p>
            <h3 class="titre1"><?= $LibSsTitr1 ?></h3>
            <p class="para2"><?= $Parag2A ?></p>
            <h3 class="titre2"><?= $LibSsTitr2 ?></h3>
            <p class="para3"><?= $Parag3A ?></p>
            <p class="conclu"><?= $LibConclA ?></p>
            <div class="divlike">
                <!-- <p>Like</p> -->
                <form method="POST">
                    <button class="pouce" type="submit" name="jaime"><img class="pouceimg" src="../images/like.png"></button>
                </form>
                <?php
                    if(isset($_POST["jaime"])){
                        $Likes++;
                        $sql = "UPDATE article SET Likes=:Likes WHERE NumArt = '$id'"; // Mise en place de l'Update
                        $statement = $connection->prepare($sql); // Préparation de sql
                        $go = $statement->execute([':Likes' => $Likes]);
                    }
                ?>
                <p><?=$Likes?></p>
            </div>
            <div class="icons">
            <a href="https://twitter.com/BordHorry" target="_blank"> <img src="../images/twitter.png" class="icon" alt="Logo de twitter" > </a>
            <a href="https://medium.com/@horry.bord" target="_blank"> <img src="../images/medium.png" class="icon" alt="Logo de medium"> </a>
            <a href="https://www.instagram.com/horry_bord/" target="_blank"> <img src="../images/instagram.png" class="icon" alt="Logo d'instagram"> </a>
            </div>
        </div>
        <div class="barlat"></div>
    </div>













        <div class="container"> <!-- Code bootstrap -->
            <div class="card mt-5 bkcard">
                
            </div>
        </div>
        <?php require '../Require_php/footer.php'; ?>
    </body>
</html>
