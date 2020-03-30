<aside>
    <div class="search">
        <div class="divloupe">
            <img src="../images/search.png" alt="" class="louperech">
        </div>
        <form class="search-form" method="GET" action="../Recherche/index.php">
            <input type="search"name="search" placeholder="Rechercher">
        </form>
    </div>
    <div class="div_titre_barlat">
        <div class="trait_aside"></div>
        <h1 class="titre_aside">Article récent</h1>
    </div>
    <?php
        require '../db.php'; // On importe le fichier db.php
        $requete = "SELECT MAX(NumArt) AS NumArt FROM ARTICLE";
        $result = $connection->query($requete);
        $NumLastArt = $result->fetch();
        $NumLastArt = end($NumLastArt);
        $NumLastArt = (int)$NumLastArt;
        $sql = "SELECT * FROM article WHERE NumArt = '$NumLastArt'";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $articles = $statement->fetch();
        $LibTitrA = $articles['LibTitrA'];
        $UrlPhotA = $articles['UrlPhotA'];
    ?>
    <a href="../ArticleType/index.php?id=<?= $NumLastArt ?>" style="text-decoration: none;"><div class="images_aside" style="background-image: url('<?= $UrlPhotA ?>');">
        <p class="titre2_aside"><?= $LibTitrA ?></p>
    </div></a>
    <div class="div_titre_barlat">
        <div class="trait_aside"></div>
        <h1 class="titre_aside">Playlist d'Horry'Bord</h1>
    </div>
    <iframe class="playlist" src="https://play.soundsgood.co/embed/5e754bed7381827590892c68?color=323733&hideCurator=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay; encrypted-media" allowtransparency="true"></iframe>
    <div class="reseaux-sociaux">
        <img class ="reseaux_sociauxt" src="../images/twitter1.png" alt="twitter_logo">
        <img class="reseaux_sociauxi" src="../images/insta1.png" alt="instagram_logo">
        <img class="reseaux_sociauxm" src="../images/medium1.png" alt="medium_logo">
    </div>
</aside>