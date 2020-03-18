<?php
  require '../db.php'; // Importation du fichier db.php
  $id = $_GET['id']; // Récupération d'id
  $sql = 'SELECT * FROM thematique WHERE NumThem=:id'; // Tout sélectionner à propos de la table langue ou NumLang=:id
  $statement = $connection->prepare($sql); // Préparation de $sql
  $statement->execute([':id' => $id ]); // 
  $person = $statement->fetch(PDO::FETCH_OBJ);
  if (isset ($_POST['Lbc']) ) { // Test des informations du form
    $Lbc = $_POST['Lbc']; // On met les informations du form dans une variable
    $sql = 'UPDATE thematique SET LibThem=:Lbc WHERE NumThem=:id'; // Mise en place de l'Update
    $statement = $connection->prepare($sql); // Préparation de sql
    if ($statement->execute([':Lbc' => $Lbc, ':id' => $id])) { // Mise à jour des infos
      header("Location: index.php"); // Redirection vers index.php
    }
  }
 ?>
 
<?php require 'header.php'; ?> <!-- On va chercher header.php -->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Mettre à jour la thematique : <?= $person->LibThem; ?> ? </h2> <!-- Récupération de Lib1Lang et affichage -->
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?> <!-- On regarde si $message n'est pas vide -->
        <div class="alert alert-success">
          <?= $message; ?> <!-- On fait echo de $message -->
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="Lbc">Libellé court</label>
          <input value="<?= $person->LibThem; ?>" type="text" name="Lbc" id="Lbc" class="form-control" maxlength="25" required> <!-- Récupération de la vateur Lib1Lang, définition d'un maxlength et force à ce que l'utilisateur remplisse la case -->
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Mettre à jour la langue</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?> <!-- Va chercher le fichier footer.php -->
