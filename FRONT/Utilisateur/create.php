<?php
  require '../db.php';
  $libErr = "";
  $Send = "";

  require '../controlerSaisies.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

  $Identifiant = (ctrlSaisies($_POST["Identifiant"]));
  $mdp = (ctrlSaisies($_POST["mdp"]));
  $Nom = (ctrlSaisies($_POST["Nom"]));
  $Prenom = (ctrlSaisies($_POST["Prenom"]));
  $Email = (ctrlSaisies($_POST["Email"]));

  $sql = 'SELECT COUNT(Login) FROM user WHERE Login = ?';
  $statement = $connection->prepare($sql);
  $statement->execute(array($Identifiant));

  if(!$statement->fetchColumn()){//on regarde si la valeur de la colonne COUNT(*) vaut 0 en vérifiant qu'elle vaut false = aucune entrée ne correspond à la recherche, donc...
   //L'utilisateur n'existe pas, il est nouveau
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



    $Send = "<p style=color:green;>Votre compte ".$Identifiant." à bien été créé. </p>";



    }
    catch (PDOException $e) {
      die('Failed to insert Article : ' . $e->getMessage());
      $connection->rollBack();
    }
  } else {
   //Identifiant déjà pris
   $libErr = "<p style=color:red;>Erreur ! L’identifiant ou le mot de passe existe déja ! </p>";
  }

}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
    <script src="../script_global.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>S'inscrire</title>
</head>
<body>
    <?php require '../Require_php/Illustration_header.php'; ?><!--header-->
    <?php require '../Require_php/barnav.php'; ?><!--navbar-->
    <!-- mennu -->
    <div class="content">
        <div class="fichecontact">
          <div class="limitcont">
            <h2 class="titrepage" >S'inscrire</h2>
            <?php if(!empty($message)): ?> <!-- Si $message n'est pas vide -->
            <div class="alert alert-success"> <!-- Alerte succes -->
              <?= $message; ?> <!-- Echo de $message -->
            </div>
            <?php endif; ?>
            <form class="container-contact-us" method="POST"> <!-- Si le formulaire est activé, on redirige vers action-create.php -->
              <div class="form-group">
                  <?php
                  echo $libErr;
                  echo $Send;
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
            <div class="icons">
              <a href="https://twitter.com/BordHorry" target="_blank"> <img src="../images/twitter.png" class="icon" alt="Logo de twitter" > </a>
              <a href="https://medium.com/@horry.bord" target="_blank"> <img src="../images/medium.png" class="icon" alt="Logo de medium"> </a>
              <a href="https://www.instagram.com/horry_bord/" target="_blank"> <img src="../images/instagram.png" class="icon" alt="Logo d'instagram"> </a>
            </div>
          </div>
        </div>
        <div class="barlat">
          <?php require '../Require_php/barlat.php'; ?>
        </div>
    </div>
    <!-- footer -->
    <?php require '../Require_php/footer.php'; ?>
</body>
</html>