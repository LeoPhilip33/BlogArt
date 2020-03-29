<?php
session_start();

if(!isset($_SESSION['user']['Login'])) {
    $utilisateur = " ";
}
else{
    $utilisateur = $_SESSION['user']['Login'];
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
    <title>Accueil</title>
</head>
<body>
    <?php require '../Require_php/Illu_Accueil.php'; ?><!--header-->
    <p class="Utilisateur"> Blyat </p>
    <?php require '../Require_php/barnav.php'; ?><!--navbar-->
    <!-- mennu -->
    <p class="titreacprins">Dernières sorties</p>
    <div class="content">
        <div class="fichecontact">
                <?php
                    require '../db.php'; // On importe le fichier db.php
                    $requete = "SELECT MAX(NumArt) AS NumArt FROM ARTICLE";
                    $result = $connection->query($requete);
                    $NumLastArt = $result->fetch();
                    $NumLastArt = end($NumLastArt);
                    $NumLastArt = (int)$NumLastArt;
                    $NumLastArt2 = $NumLastArt - 1;
                    $NumLastArt3 = $NumLastArt - 2;
                ?>
                <?php
                    $sql = "SELECT * FROM article WHERE NumArt = '$NumLastArt'";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $articles = $statement->fetch();
                
                    $LibTitrA = $articles['LibTitrA'];
                    $LibAccrochA = $articles['LibAccrochA'];
                    $UrlPhotA = $articles['UrlPhotA'];
                ?>
                <a href="../ArticleType/index.php?id=<?= $NumLastArt ?>" style="text-decoration: none;"><div class="artmisenavant" style="background-image: url('<?= $UrlPhotA ?>');">
                    <div></div>
                    <div class="descartmea">
                        <p class="titreartmea1"><?= $LibTitrA ?></p>
                        <p class="txtartmea1"><?= $LibAccrochA ?></p>
                    </div>
                </div></a>
                <?php
                    $sql = "SELECT * FROM article WHERE NumArt = '$NumLastArt2'";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $articles = $statement->fetch();
                
                    $LibTitrA = $articles['LibTitrA'];
                    $LibAccrochA = $articles['LibAccrochA'];
                    $UrlPhotA = $articles['UrlPhotA'];
                ?>
                <div class="artmisenavant2">
                    <div class="imgilluartmea" style="background-image: url('<?= $UrlPhotA ?>');"></div>
                    <div class="txtilluartmea">
                    <a href="../ArticleType/index.php?id=<?= $NumLastArt2 ?>" style="text-decoration: none;"><p class="titreartmea2"><?= $LibTitrA ?></p></a>
                        <p class="txtartmea2"><?= $LibAccrochA ?></p>
                        <div class="part2txtilluartmea">
                            <div class="barretxtilluartmea"></div>
                            <a href="../ArticleType/index.php?id=<?= $NumLastArt2 ?>" style="text-decoration: none;"><div class="voirvignadm"><p>Voir plus</p></div></a>
                        </div>
                    </div>
                </div>
                <?php
                    $sql = "SELECT * FROM article WHERE NumArt = '$NumLastArt3'";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $articles = $statement->fetch();
                
                    $LibTitrA = $articles['LibTitrA'];
                    $LibAccrochA = $articles['LibAccrochA'];
                    $UrlPhotA = $articles['UrlPhotA'];
                ?>
                <div class="artmisenavant2">
                    <div class="imgilluartmea" style="background-image: url('<?= $UrlPhotA ?>');"></div>
                    <div class="txtilluartmea">
                        <a href="../ArticleType/index.php?id=<?= $NumLastArt3 ?>" style="text-decoration: none;"><p class="titreartmea2"><?= $LibTitrA ?></p></a>
                        <p class="txtartmea2"><?= $LibAccrochA ?></p>
                        <div class="part2txtilluartmea">
                            <div class="barretxtilluartmea"></div>
                            <a href="../ArticleType/index.php?id=<?= $NumLastArt3 ?>" style="text-decoration: none;"><div class="voirvignadm"><p>Voir plus</p></div></a>
                        </div>
                    </div>
                </div>
                
                <!-- <div class="icons">
                <a href="https://twitter.com/BordHorry" target="_blank"> <img src="../images/twitter.png" class="icon" alt="Logo de twitter" > </a>
                <a href="https://medium.com/@horry.bord" target="_blank"> <img src="../images/medium.png" class="icon" alt="Logo de medium"> </a>
                <a href="https://www.instagram.com/horry_bord/" target="_blank"> <img src="../images/instagram.png" class="icon" alt="Logo d'instagram"> </a>
                </div> -->
        </div>
        <div class="barlat">
          <?php require '../Require_php/barlat.php'; ?>
        </div>
    </div>
    <p class="titreacprins">Tous nos terrifiants articles</p>
    <div class="Tousnosarticle" >
        <ul class="menutna">
            <li class="tna1">Tous les articles</li>
            <li class="tna2">Les plus aimés</li>
        </ul>
        <div class="listartwarp">
            <div class="vigntna" style="background-image: url('../images/images_aside_1.jpg');">
                <div></div>
                <div class="divbasvign">
                    <p class="titreartmea2">sdjhfbqsdhbfhqsdbfjhqsdjhfqsdjhfbsjqhdvfjhsdbfhjsdbfhjsdbhjfbsdqhjfbsdhjfbhsdjbfjhdsbfjhdsbfjhdsbfjh</p>
                    <a href="" style="text-decoration: none;"><div class="voirvignadm2"><p>Voir plus</p></div></a>
                </div>
            </div>
            <div class="vigntna" style="background-image: url('../images/images_aside_1.jpg');">
                <div></div>
                <div class="divbasvign">
                    <p class="titreartmea2">sdjhfbqsdhbfhqsdbfjhqsdjhfqsdjhfbsjqhdvfjhsdbfhjsdbfhjsdbhjfbsdqhjfbsdhjfbhsdjbfjhdsbfjhdsbfjhdsbfjh</p>
                    <a href="" style="text-decoration: none;"><div class="voirvignadm2"><p>Voir plus</p></div></a>
                </div>
            </div>
            <div class="vigntna" style="background-image: url('../images/images_aside_1.jpg');">
                <div></div>
                <div class="divbasvign">
                    <p class="titreartmea2">sdjhfbqsdhbfhqsdbfjhqsdjhfqsdjhfbsjqhdvfjhsdbfhjsdbfhjsdbhjfbsdqhjfbsdhjfbhsdjbfjhdsbfjhdsbfjhdsbfjh</p>
                    <a href="" style="text-decoration: none;"><div class="voirvignadm2"><p>Voir plus</p></div></a>
                </div>
            </div>
            <div class="vigntna" style="background-image: url('../images/images_aside_1.jpg');">
                <div></div>
                <div class="divbasvign">
                    <p class="titreartmea2">sdjhfbqsdhbfhqsdbfjhqsdjhfqsdjhfbsjqhdvfjhsdbfhjsdbfhjsdbhjfbsdqhjfbsdhjfbhsdjbfjhdsbfjhdsbfjhdsbfjh</p>
                    <a href="" style="text-decoration: none;"><div class="voirvignadm2"><p>Voir plus</p></div></a>
                </div>
            </div>
            <div class="vigntna" style="background-image: url('../images/images_aside_1.jpg');">
                <div></div>
                <div class="divbasvign">
                    <p class="titreartmea2">sdjhfbqsdhbfhqsdbfjhqsdjhfqsdjhfbsjqhdvfjhsdbfhjsdbfhjsdbhjfbsdqhjfbsdhjfbhsdjbfjhdsbfjhdsbfjhdsbfjh</p>
                    <a href="" style="text-decoration: none;"><div class="voirvignadm2"><p>Voir plus</p></div></a>
                </div>
            </div>
            <div class="vigntna" style="background-image: url('../images/images_aside_1.jpg');">
                <div></div>
                <div class="divbasvign">
                    <p class="titreartmea2">sdjhfbqsdhbfhqsdbfjhqsdjhfqsdjhfbsjqhdvfjhsdbfhjsdbfhjsdbhjfbsdqhjfbsdhjfbhsdjbfjhdsbfjhdsbfjhdsbfjh</p>
                    <a href="" style="text-decoration: none;"><div class="voirvignadm2"><p>Voir plus</p></div></a>
                </div>
            </div>
        </div>
        
    </div>
    <!-- footer -->
    <?php require '../Require_php/footer.php'; ?>
</body>
</html>