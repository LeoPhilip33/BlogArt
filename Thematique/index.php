<?php
require 'db.php'; // On importe le fichier db.php
$sql = 'SELECT * FROM thematique'; // Met dans la varaible toute la sélection de la table langue
$statement = $connection->prepare($sql);
$statement->execute();
$langues = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?> <!-- Importation du header.php -->
<div class="container"> <!-- Code bootstrap -->
  <div class="card mt-5 bkcard"> <!-- Code bootstrap -->
    <div class="card-header"> <!-- Code bootstrap -->
      <div class="box">
        <div class="gauche" ><h2>Les langues :</h2></div><!-- Titre h2 -->
        <form method="post" action="search.php">
          <div class="droit"><input type="search" id="site-search" name="q" placeholder="Rechercher.."> <button>Rechercher</button> </div>
        </form>
      </div>
    </div>
    <div class="card-body"> <!-- Code bootstrap -->
      <table class="table table-bordered"> <!-- Code bootstrap -->
        <tr> <!-- Tableau -->
          <th>LibThem</th>
          <th>NumLang</th>
        </tr> <!-- FIN tableau -->
        <?php foreach($langues as $row): ?> <!-- Tableau en PHP -->
          <tr>
            <td><?= $row->LibThem; ?></td> <!-- Lecture ligne par ligne -->
            <td><?= $row->NumLang; ?></td>
            <td>
            <?php
              $id = $row->NumThem ; // Rentre dans $id la combinaison de $row->NumLang
              $LibThem = $row->LibThem;
            ?>
              <a href="edit.php?id=<?= $id ?>" class="btn btn-info">Edit</a> <!-- Link vers la page d'édition tout en envoyant l'id -->
              <a onclick="return confirm('Vous êtes sur le point de supprimer <?php echo $LibThem ?>, voulez-vous continuer ?')" href="delete.php?id=<?= $id ?>" class='btn btn-danger'>Delete</a> <!-- Demande de confirmation avant un delet. Si oui on renvoit vers la page delet.php avec l'ID pour connaitre l'élément à supprimer -->
            </td>
          </tr> <!-- Fin du tableau -->
        <?php endforeach; ?> <!-- Fermeture de la boucle -->
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?> <!-- Inportation du fichier footer.php -->
