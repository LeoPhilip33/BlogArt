<?php
  require '../db.php'; // Importation du fichier db.php
  $id = $_GET['id']; // Récupération d'id
  $sql = 'SELECT * FROM user WHERE Login=:id'; // Tout sélectionner à propos de la table langue ou NumLang=:id
  $statement = $connection->prepare($sql); // Préparation de $sql
  $statement->execute([':id' => $id ]); // 
  $person = $statement->fetch(PDO::FETCH_OBJ);
  if (isset ($_POST['Login']) && isset ($_POST['Pass']) && isset ($_POST['LastName']) && isset ($_POST['FirstName']) && isset ($_POST['Email']) ) { // Test des informations du form
    $Login = $_POST['Login']; // On met les informations du form dans une variable
    $Pass = $_POST['Pass']; // On met les informations du form dans une variable
    $LastName = $_POST['LastName']; // On met les informations du form dans une variable
    $FirstName = $_POST['FirstName']; // On met les informations du form dans une variable
    $Email = $_POST['Email']; // On met les informations du form dans une variable
    $sql = 'UPDATE user SET Login=:Login, Pass=:Pass, LastName=:LastName, FirstName=:FirstName, Email=:Email WHERE Login=:id'; // Mise en place de l'Update
    $statement = $connection->prepare($sql); // Préparation de sql
    if ($statement->execute([':Login' => $Login, ':Pass' => $Pass, ':LastName' => $LastName, ':FirstName' => $FirstName, ':Email' => $Email, ':id' => $id])) { // Mise à jour des infos
      header("Location: index.php"); // Redirection vers index.php
    }
  }
 ?>
 
<?php require '../header.php'; ?> <!-- On va chercher header.php -->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Mettre à jour la' : <?= $person->Login; ?> ? </h2> <!-- Récupération de Lib1Lang et affichage -->
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?> <!-- On regarde si $message n'est pas vide -->
        <div class="alert alert-success">
          <?= $message; ?> <!-- On fait echo de $message -->
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="Login">Login</label>
          <input type="text" value="<?= $person->Login; ?>" name="Login" id="Login" class="form-control" maxlength="30" required> <!-- Récupération de la vateur Lib1Lang, définition d'un maxlength et force à ce que l'utilisateur remplisse la case -->
        </div>
        <div class="form-group">
          <label for="Pass">Pass</label>
          <input type="text" value="<?= $person->Pass; ?>" name="Pass" id="Pass" class="form-control" maxlength="15" required>
        </div>
        <div class="form-group">
          <label for="LastName">LastName</label>
          <input type="text" value="<?= $person->LastName; ?>" name="LastName" id="LastName" class="form-control" maxlength="30" required>
        </div>
        <div class="form-group">
          <label for="FirstName">FirstName</label>
          <input type="text" value="<?= $person->FirstName; ?>" name="FirstName" id="FirstName" class="form-control" maxlength="30" required>
        </div>
        <div class="form-group">
          <label for="Email">Email</label>
          <input type="text" value="<?= $person->EMail; ?>" name="Email" id="Email" class="form-control" maxlength="50" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Mettre à jour la langue</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?> <!-- Va chercher le fichier footer.php -->
