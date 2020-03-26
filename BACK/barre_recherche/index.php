<meta charset="utf-8" />
<?php
 
 require '../db.php';
 
$articles = $connection->query('SELECT LibTitrA FROM article ORDER BY NumArt DESC');
if(isset($_GET['q']) AND !empty($_GET['q'])) {
   $q = htmlspecialchars($_GET['q']);
   $articles = $connection->query('SELECT LibTitrA FROM article WHERE LibTitrA LIKE "%'.$q.'%" ORDER BY NumArt DESC');
   if($articles->rowCount() == 0) {
      $articles = $connection->query('SELECT LibTitrA FROM article WHERE CONCAT(LibTitrA, LibChapoA) LIKE "%'.$q.'%" ORDER BY NumArt DESC');
   }
}
?>
<form method="GET">
   <input type="search" name="q" placeholder="Recherche..." />
   <input type="submit" value="Valider" />
</form>
<?php if($articles->rowCount() > 0) { ?>
   <ul>
   <?php while($a = $articles->fetch()) { ?>
      <li><?= "<a href=''>".$a['LibTitrA']."</a>" ?></li>
   <?php } ?>
   </ul>
<?php } else { ?>
Aucun résultat pour: <?= $q ?>...
<?php } ?>