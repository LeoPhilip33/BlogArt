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
        <div class="form-row">
          <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" class="inputinscription1" placeholder="Nom" maxlength="25" required>
          </div>
          <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" class="inputinscription1" placeholder="Prénom" maxlength="30" required>
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" class="inputinscription" placeholder="Adresse Email" maxlength="45" required>
        </div>
        <div class="form-group">
          <label for="identifiant">Identifiant :</label>
          <input type="text" name="identifiant" class="inputinscription" placeholder="Identifiant" maxlength="25" required>
        </div>
        <div class="form-group">
          <label> Mot de passe</label>
        </div>
        <div class="password">
          <input type="Password" name="Pass" maxlength="15" required>
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