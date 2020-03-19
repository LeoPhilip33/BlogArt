<?php
  require '../db.php'; // Importation du fichier db.php
  $id = $_GET['id']; // Récupération d'id
  $sql = 'SELECT * FROM user WHERE Login=:id'; // Tout sélectionner à propos de la table langue ou NumLang=:id
  $statement = $connection->prepare($sql); // Préparation de $sql
  $statement->execute([':id' => $id ]); // 
  $person = $statement->fetch(PDO::FETCH_OBJ);
  if (isset ($_POST['Lbc'])  && isset($_POST['Lbl']) && isset ($_POST['pays']) ) { // Test des informations du form
    $Lbc = $_POST['Lbc']; // On met les informations du form dans une variable
    $Lbl = $_POST['Lbl']; // On met les informations du form dans une variable
    $pays = $_POST['pays']; // On met les informations du form dans une variable
    $sql = 'UPDATE langue SET Lib1Lang=:Lbc, Lib2Lang=:Lbl, NumPays=:pays WHERE NumLang=:id'; // Mise en place de l'Update
    $statement = $connection->prepare($sql); // Préparation de sql
    if ($statement->execute([':Lbc' => $Lbc, ':Lbl' => $Lbl, ':pays' => $pays, ':id' => $id])) { // Mise à jour des infos
      header("Location: index.php"); // Redirection vers index.php
    }
  }
 ?>
 
<?php require '../header.php'; ?> <!-- On va chercher header.php -->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Mettre à jour la langue : <?= $person->Login; ?> ? </h2> <!-- Récupération de Lib1Lang et affichage -->
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
          <input value="<?= $person->Lib1Lang; ?>" type="text" name="Lbc" id="Lbc" class="form-control" maxlength="25" required> <!-- Récupération de la vateur Lib1Lang, définition d'un maxlength et force à ce que l'utilisateur remplisse la case -->
        </div>
        <div class="form-group">
          <label for="Lbl">Libellé long</label>
          <input type="text" value="<?= $person->Lib2Lang; ?>" name="Lbl" id="Lbl" class="form-control" maxlength="45" required>
        </div>
        <div class="form-group">
          <label for="pays">Quelle pays</label>
          <input type="text" value="<?= $person->NumPays; ?>" name="pays" id="pays" class="form-control" maxlength="4" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Mettre à jour la langue</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?> <!-- Va chercher le fichier footer.php -->
