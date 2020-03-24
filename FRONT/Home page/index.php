<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <title>Home_page</title>
    </head>
    <body>
        
 <header>
    <div class="decouvrir_arrow">
        <h2 class="decouvrir">Découvrir</h2>
        <img class="arrow" src="../images/arrow.svg" alt="flèche">
    </div> 
 </header>
 <?php require '../Require_php/barnav.php'; ?><!--navbar-->
 <div id="container">
<div id="part1">
<div class="select_element"></div>

<h1 class="titre_homepage1">Dernières sorties</h1>
 <div class="dernieres_sorties">
     <h2 class="titre_derniere_sortie">Les momies de la basique Saint-Michel</h2>
     <h3 class="sous_titre_ds">Annabelle a encore frappé! Découvrez si cela se passe près de chez vous</h3>
   
 </div>

 <div class="article_homepage_1">
     <img class="image_homepage_part1" src="../images/photo_article_homepage_1.jpeg" alt="La dune du pilat">
     <div class="texte_article1">
     <h2 class="titre_article">LA DAME BLANCHE</h2>
     <h3 class="texte_article">Un automobiliste croise la dame blanche sur la route de Bordeaux!</h3>
     <button class="bouton_voirplus1">Voir plus ></button>
    </div>
     <div class="trait_article_homepage_1"></div>
    </div>
 

 <div class="article_homepage_2">
     <img class="image_homepage_part1" src="../images/photo_article_homepage_2.png" alt="Stranger Things">
     <div class="texte_article2">
     <h2 class="titre_article">LA MOMIE BORDELAISE</h2>
     <h3 class="texte_article">Légende urbaine ou réalité ? Découvrez l'histoire des momies bordelaises...</h3>
     <button class="bouton_voirplus2">Voir plus ></button>
    </div>
    <div class="trait_article_homepage_2"></div>
</div>
<aside>

<div class="search">
				<form class="search-form">
					<input type="text" placeholder="Rechercher">
				</form>
			</div>
        
        
         <div class="trait_aside_1"></div>
        <h1 class="titre_aside">Article récent</h1>
        <img class="images_aside" src="../images/images_aside_1.jpg" alt="Aside photo">
        <h2 class="titre2_aside">La bête du Gévaudan</h2>
        <div class="trait_aside_2"></div>
        <h1 class="titre_aside">Playlist d'Horry'Bord</h1>
        <iframe class="playlist" src="https://play.soundsgood.co/embed/5e754bed7381827590892c68?color=323733&hideCurator=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay; encrypted-media" allowtransparency="true"></iframe>
        
         <div class="reseaux-sociaux">
            <img class ="reseaux_sociauxt" src="../images/twitter1.png" alt="twitter_logo">
        
            <img class="reseaux_sociauxi" src="../images/insta1.png" alt="instagram_logo">
        
            <img class="reseaux_sociauxm" src="../images/medium1.png" alt="medium_logo">
        </div>
       
</aside>
</div>
 
<div id="part2">
<h1 class="titre_homepage2"> Tous nos terrifiants articles</h1>

<div class="menu_part2">
    <h2 class="all">Tout</h2>
     <h2 class="les_plus_lus">Les + lus</h2>
     <h2 class="les_mieux_notes">Les mieux notés</h2>
</div>
     
         <div class="vignette1">
            <div class="image_vignette1"> </div>
             <div class="trait_vignette1"></div>
             <h1 class="texte_vignette1">L'HISTOIRE DE LA MOMIE BORDELAISE</h1>
             <button class="voirplus_vignette1">Voir plus ></button>
         </div>
     

         <div class="vignette2">
         <div class="image_vignette2"> </div>
        <div class="trait_vignette2"></div>
        <h2 class="texte_vignette2">LE VILLAGE CACHÉ DE LA DUNE DU PILAT</h2>
        <button class="voirplus_vignette2">Voir plus ></button>
        </div>

        <div class="vignette5">
        <div class="image_vignette5"> </div>
            <div class="trait_vignette5"></div>
            <h1 class="texte_vignette5">L'EFFROYABLE HISTOIRE DE LA RUE DU MIRAIL</h1>
            <button class="voirplus_vignette5">Voir plus ></button>
            </div>
    


         <div class="vignette3">
         <div class="image_vignette3"> </div>
        <div class="trait_vignette3"></div>
        <h1 class="texte_vignette3">LES TERRIFIANTES MOMIES DE SAINT MICHEL</h1>
        <button class="voirplus_vignette3">Voir plus ></button>
        </div>

        <div class="vignette4">
        <div class="image_vignette4"> </div>
            <div class="trait_vignette4"></div>
            <h1 class="texte_vignette4">LA BASE NAUTIQUE DE BORDEAUX</h1>
            <button class="voirplus_vignette4">Voir plus ></button>
            </div>
    
    
  


 </div>
  </div>
  <!-- footer -->
 <?php require '../Require_php/footer.php'; ?>
    </body>
</html>