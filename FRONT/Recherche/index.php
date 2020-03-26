<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="style.css">
        <title>Horry Bord - Connexion</title>
    </head>
    <body>
        <?php require '../Require_php/Illustration_header.php'; ?><!--header-->
        <?php require '../Require_php/barnav.php'; ?><!--navbar-->
        <!-- mennu -->
        <div class="content">
            <div class="fichecontact">
                <h3 class="titrecont">Résultats de recherche</h3>
                <meta charset="utf-8" />
                <?php
                
                    require '../db.php';
                
                    $articles = $connection->query('SELECT LibTitrA FROM article ORDER BY NumArt DESC');
                    if(isset($_GET['search']) AND !empty($_GET['search'])) {
                        $search = htmlspecialchars($_GET['search']);
                        $articles = $connection->query('SELECT LibTitrA FROM article WHERE LibTitrA LIKE "%'.$search.'%" ORDER BY NumArt DESC');
                        if($articles->rowCount() == 0) {
                            $articles = $connection->query('SELECT LibTitrA FROM article WHERE CONCAT(LibTitrA, LibChapoA) LIKE "%'.$search.'%" ORDER BY NumArt DESC');
                        }

                    }
                ?>
                <?php if($articles->rowCount() > 0) { ?>
                <?php
                while($rows = $articles->fetch()) {
                    $titre=$rows['LibTitrA'];
                    $ContArt = "SELECT * FROM article WHERE LibTitrA='$titre'";
                    $result = $connection->query($ContArt);
                    if ($result) {
                        while ($tuple = $result->fetch()) {
                ?>
                        <div class="traitsepare"></div>
                        <p class="titreartrech"><?= "<a style='text-decoration:none; color:#F8F8F8;' href=''>".$titre."</a>" ?></p>
                        <p class="datemotcle"><?=$tuple["DtCreA"]?></p>
                        <div class="rowrech">
                            <div class="imgrech"></div>
                            <div class="divconttext">
                                <p class="accrocherech"><?=$tuple["LibAccrochA"]?></p>
                                <a style="text-decoration:none" href="../ArticleType/index.php?id=<?=$tuple["NumArt"]?>"><div class="btnvp" id="btnvp"><p>Voir plus</p></div></a>
                            </div>
                        </div>

                <?php
                        }
                    }
                }
                ?>



                <div class="traitseparefin"></div>
                <p class="txtfinreh">Fin des résultats pour la recherche : <?= $search ?></p>
                

                <?php } else { ?>
                <p class="txtfinreh">Aucun résultat pour: <?= $search ?>...</p>
                <?php } ?>

            </div>
            <div class="barlat">
                <?php require '../Require_php/barlat.php'; ?>
            </div>
        </div>
        <?php require '../Require_php/footer.php'; ?>
    </body>
</html>