<?php
require '../db.php'; // On importe le fichier db.php
$sql = 'SELECT * FROM article'; // Met dans la varaible toute la sélection de la table langue
$statement = $connection->prepare($sql);
$statement->execute();
$articles = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require '../header.php'; ?> <!-- Importation du header.php -->
<div class="container"> <!-- Code bootstrap -->
  <div class="card mt-5 bkcard"> <!-- Code bootstrap -->
    <div class="card-header"> <!-- Code bootstrap -->
      <div class="box">
        <div class="gauche" ><h2>Articles :</h2></div><!-- Titre h2 -->
        <form method="post" action="search.php">
          <div class="droit"><input type="search" id="site-search" name="q" placeholder="Rechercher.."> <button>Rechercher</button> </div>
        </form>
      </div>
    </div>
    <div class="card-body"> <!-- Code bootstrap -->
      <table class="table table-bordered"> <!-- Code bootstrap -->
        <tr> <!-- Tableau -->
          <th>NumArt</th>
          <th>DtCreA</th>
          <th>LibTitrA</th>
          <th>LibChapoA</th>
          <th>LibAccrochA</th>
          <th>Parag1A</th>
          <th>LibSsTitr1</th>
          <th>Parag2A</th>
          <th>LibSsTitr2</th>
          <th>Parag3A</th>
          <th>LibConclA</th>
          <th>UrlPhotA</th>
          <th>Likes</th>
          <th>NumAngl</th>
          <th>NumThem</th>
          <th>NumLang</th>
        </tr> <!-- FIN tableau -->
        <?php foreach($articles as $row): ?> <!-- Tableau en PHP -->
          <tr>
            <td><?= $row->NumArt; ?></td> <!-- Lecture ligne par ligne -->
            <td><?= $row->DtCreA; ?></td>
            <td><?= $row->LibTitrA; ?></td>
            <td><?= $row->LibChapoA; ?></td>
            <td><?= $row->LibAccrochA; ?></td>
            <td><?= $row->Parag1A; ?></td>
            <td><?= $row->Parag2A; ?></td>
            <td><?= $row->LibSsTitr2; ?></td>
            <td><?= $row->Parag3A; ?></td>
            <td><?= $row->LibConclA; ?></td>
            <td><?= $row->UrlPhotA; ?></td>
            <td><?= $row->Likes; ?></td>
            <td><?= $row->NumAngl; ?></td>
            <td><?= $row->NumThem; ?></td>
            <td><?= $row->NumLang; ?></td>
            <td>
            <?php
              $id = $row->NumArt ; // Rentre dans $id la combinaison de $row->NumLang
              $NomArt = $row->LibTitrA;
            ?>
              <a href="edit.php?id=<?= $id ?>" class="btn btn-info">Edit</a> <!-- Link vers la page d'édition tout en envoyant l'id -->
              <a onclick="return confirm('Vous êtes sur le point de supprimer <?php echo $NomArt ?>, voulez-vous continuer ?')" href="delete.php?id=<?= $id ?>" class='btn btn-danger'>Delete</a> <!-- Demande de confirmation avant un delet. Si oui on renvoit vers la page delet.php avec l'ID pour connaitre l'élément à supprimer -->
            </td>
          </tr> <!-- Fin du tableau -->
        <?php endforeach; ?> <!-- Fermeture de la boucle -->
      </table>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?> <!-- Inportation du fichier footer.php -->
