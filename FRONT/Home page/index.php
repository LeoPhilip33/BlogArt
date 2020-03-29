<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
    <script src="../script_global.js"></script>
    <link rel="icon" href="../images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Accueil - Horry'Bord</title>
</head>
<body>
    <?php require '../Require_php/Illu_Accueil.php'; ?><!--header-->
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
            <li class="tna1" onclick="ordernumart()">Tous les articles</li>
            <li class="tna2" onclick="orderlike()">Trier par nombre de likes</li>
        </ul>
        <?php
        require '../db.php'; // On importe le fichier db.php
        $sql = 'SELECT * FROM article'; // Met dans la varaible toute la sélection de la table langue
        $statement = $connection->prepare($sql);
        $statement->execute();
        $articles = $statement->fetchAll(PDO::FETCH_OBJ);
        $numvign = 1;
        ?>
        <div class="listartwarp">
            <?php foreach($articles as $row): ?> <!-- Tableau en PHP -->
                <div class="vigntna" id="vign<?=$numvign?>" style="background-image: url('<?= $row->UrlPhotA; ?>'); order: <?= $row->NumArt; ?>;">
                    <p class="stocknumart" id="numart<?=$numvign?>"><?=$row->NumArt;?></p>
                    <p class="stocklikes" id="like<?=$numvign?>"><?= $row->Likes; ?></p>
                    <div class="divbasvign">
                        <p class="titreartmea2"><?= $row->LibTitrA; ?></p>
                        <a href="../ArticleType/index.php?id=<?= $row->NumArt; ?>" style="text-decoration: none;"><div class="voirvignadm2"><p>Voir plus</p></div></a>
                    </div>
                </div>
                <?php $numvign++;?>
            <?php endforeach; ?> <!-- Fermeture de la boucle -->
        </div>
    </div>
    <!-- footer -->
    <?php require '../Require_php/footer.php'; ?>
</body>
</html>