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
    <title>page inscription horry bord</title>
    <link rel="stylesheet" href="styleinscription.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <?php require '../Require_php/Illustration_header.php'; ?><!--header-->
  <?php require '../Require_php/barnav.php'; ?><!--navbar-->

  <div class="container">
      <div class="fiche_inscription">
        <div class="formulaire">
        <h3 class="inscription">Inscription</h3>
        <p class="texte1">Inscris-toi pour une bonne dose de frisson </p>
        <form class="formcont" method="POST">
          <?= $Send ?>
          <?= $libErr ?>
          <div class="form-row">
            <div class="form-group">
              <label for="Nom">Nom:</label>
              <input type="text" name="Nom" class="inputinscription" placeholder="Nom" maxlength="30" required>
            </div>
            <div class="form-group">
              <label for="Prenom">Prénom:</label>
              <input type="text" name="Prenom" class="inputinscription" placeholder="Prénom" maxlength="30" required>
            </div>
          </div>
          <div class="form-group">
<<<<<<< HEAD
            <label for="nom">Nom:</label>
            <input type="text" name="nom" class="inputinscription1" placeholder="Nom" maxlength="25" required>
          </div>
          <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" class="inputinscription1" placeholder="Prénom" maxlength="30" required>
=======
            <label for="Email">Email:</label>
            <input type="email" name="Email" class="inputinscription" placeholder="Adresse Email" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="Identifiant">Identifiant :</label>
            <input type="text" name="Identifiant" class="inputinscription" placeholder="Identifiant" maxlength="30" required>
>>>>>>> 975fe5eb75086da5a39e5948f9236f00ddf210ae
          </div>
          <div class="form-group">
            <label> Mot de passe</label>
          </div>
          <div class="password">
            <input type="Password" name="mdp" maxlength="15" required>
          </div>
          <div class="form-group">
            <button type="inscription" value="ok"class="btn btn-primary">S'inscrire</button>
          </div>
        </form>
        <p class="phrase_connect">Tu as déjà un compte ? <a href="login.php" class="connexion" >Connecte-toi</a></p>
      </div>
      <img src="../images/illustration_connexion.png" alt="" class="illu_connexion">
    </div>

  </div>

  <?php require '../Require_php/footer.php'; ?>

</body>
</html>