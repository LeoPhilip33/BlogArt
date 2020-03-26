<aside>
    <div class="search">
        <div class="divloupe">
            <img src="../images/search.png" alt="" class="louperech">
        </div>
        <form class="search-form" method="GET">
            <input type="search" name="search" placeholder="Rechercher">
        </form>
        <?php
 
            require '../db.php';
            
            $articles = $connection->query('SELECT LibTitrA FROM article ORDER BY NumArt DESC');
            if(isset($_GET['search']) AND !empty($_GET['search'])) {
                $q = htmlspecialchars($_GET['q']);
                $articles = $connection->query('SELECT LibTitrA FROM article WHERE LibTitrA LIKE "%'.$q.'%" ORDER BY NumArt DESC');
                    if($articles->rowCount() == 0) {
                        $articles = $connection->query('SELECT LibTitrA FROM article WHERE CONCAT(LibTitrA, LibChapoA) LIKE "%'.$q.'%" ORDER BY NumArt DESC');
                    }
            }
        ?>

    </div>
    <div class="div_titre_barlat">
        <div class="trait_aside"></div>
        <h1 class="titre_aside">Article récent</h1>
    </div>
    <div class="images_aside" style="background-image: url('../images/images_aside_1.jpg');">
        <p class="titre2_aside">La bête du Gévaudan</p>
    </div>
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