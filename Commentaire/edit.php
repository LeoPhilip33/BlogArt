<?php
  require 'db.php'; // Importation du fichier db.php
  $id = $_GET['id']; // Récupération d'id
  $sql = 'SELECT * FROM comment WHERE NumCom=:id'; // Tout sélectionner à propos de la table langue ou NumLang=:id
  $statement = $connection->prepare($sql); // Préparation de $sql
  $statement->execute([':id' => $id ]); // 
  $person = $statement->fetch(PDO::FETCH_OBJ);
  if (isset ($_POST['Pseudo'])  && isset($_POST['Email']) && isset ($_POST['Titre']) && isset ($_POST['lbl']) ) { // Test des informations du form
    $Lbc = $_POST['Pseudo']; // On met les informations du form dans une variable
    $Lbl = $_POST['Email']; // On met les informations du form dans une variable
    $pays = $_POST['Titre']; // On met les informations du form dans une variable
    $lbl_2 = $_POST['lbl'];
    $sql = 'UPDATE comment SET PseudoAuteur=:Pseudo, EmailAuteur=:Email, TitrCom=:Titre, LibCom=:lbl WHERE NumCom=:id'; // Mise en place de l'Update
    $statement = $connection->prepare($sql); // Préparation de sql
    if ($statement->execute([':Pseudo' => $Lbc, ':Email' => $Lbl, ':Titre' => $pays, ':lbl' => $lbl_2, ':id' => $id])) { // Mise à jour des infos
      header("Location: index.php"); // Redirection vers index.php
    }
  }
 ?>
 
<?php require 'header.php'; ?> <!-- On va chercher header.php -->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Mettre à jour le commentaire de : <?= $person->PseudoAuteur; ?> ? </h2> <!-- Récupération de Lib1Lang et affichage -->
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?> <!-- On regarde si $message n'est pas vide -->
        <div class="alert alert-success">
          <?= $message; ?> <!-- On fait echo de $message -->
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="Pseudo">Pseudo :</label>
          <input value="<?= $person->PseudoAuteur; ?>" type="text" name="Pseudo" id="Pseudo" class="form-control" maxlength="20" required> <!-- Récupération de la vateur Lib1Lang, définition d'un maxlength et force à ce que l'utilisateur remplisse la case -->
        </div>
        <div class="form-group">
          <label for="Email">Email :</label>
          <input type="text" value="<?= $person->EmailAuteur; ?>" name="Email" id="Email" class="form-control" maxlength="60" required>
        </div>
        <div class="form-group">
          <label for="Titre">Titre :</label>
          <input type="text" value="<?= $person->TitrCom; ?>" name="Titre" id="Titre" class="form-control" maxlength="60" required>
        </div>
        <div class="form-group">
          <label for="lbl">Libellé : </label>
          <input type="text" value="<?= $person->LibCom; ?>" name="lbl" id="lbl" class="form-control" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Mettre à jour la langue</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?> <!-- Va chercher le fichier footer.php -->
