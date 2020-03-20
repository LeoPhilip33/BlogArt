<?php require '../header.php'; 
  require '../db.php';
  $NumPays = "";
  $frPays = "";   
?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <h2>Ajoutez un utilisateur</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?> <!-- Si $message n'est pas vide -->
        <div class="alert alert-success"> <!-- Alerte succes -->
          <?= $message; ?> <!-- Echo de $message -->
        </div>
      <?php endif; ?>
      <form class="container-contact-us" method="POST"> <!-- Si le formulaire est activé, on redirige vers action-create.php -->
        <div class="form-group">
            <?php
            $error = "";
            echo $error;
            ?>
            <span class="span-text">Identifiant :</span> 
            <input class="form-control" type="text" name="Identifiant" maxlength="30" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Mot de passe :</span>
            <input class="form-control"type="password" name="mdp" maxlength="15" required>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Nom :</span>
            <input class="form-control"type="text" name="Nom" maxlength="30" required>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Prénom :</span>
            <input class="form-control"type="text" name="Prenom" maxlength="30" required>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Email :</span>
            <input class="form-control"type="email" name="Email" maxlength="50" required>
						<span class="line"></span>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Créer mon compte !</button>
        </div>
      </form>
    </div>            
  </div>
</div>

<?php
require '../db.php';
require '../controlerSaisies.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

  $Identifiant = (ctrlSaisies($_POST["Identifiant"]));
  $mdp = (ctrlSaisies($_POST["mdp"]));
  $Nom = (ctrlSaisies($_POST["Nom"]));
  $Prenom = (ctrlSaisies($_POST["Prenom"]));
  $Email = (ctrlSaisies($_POST["Email"]));

  $sql = 'SELECT * FROM user'; // Met dans la varaible toute la sélection de la table langue
  $statement = $connection->prepare($sql);
  $statement->execute();
  $user = $statement->fetchAll(PDO::FETCH_OBJ);
  foreach($user as $row):     
    $user = $row->Login;
    echo $user."<br>";
    if($user == $Identifiant){
      echo "<p style='color:red;'>Erreur ! L'identifiant ou le mot de passe existe déja ! </p>";
      $error = "Erreur ! L'identifiant ou le mot de passe existe déja !";
    }
  endforeach;

  try {
    $connection->beginTransaction();

    $query = $connection->prepare("INSERT INTO user (Login, Pass, LastName, FirstName, EMail) VALUES (:Identifiant, :mdp, :Nom, :Prenom, :Email)");

    $query->execute(
      array(
        ':Identifiant' => $Identifiant,
        ':mdp' => $mdp, 
        ':Nom' => $Nom,
        ':Prenom' => $Prenom,
        ':Email' => $Email
      )
    );

    $connection->commit();

    $query->closeCursor();

    //header("Location:index.php?#Langues");
  }
  catch (PDOException $e) {
    die('Failed to insert Article : ' . $e->getMessage());
    $connection->rollBack();
  }

}
?>
<?php require '../footer.php'; ?> <!-- Va chercher le fichier footer.php -->