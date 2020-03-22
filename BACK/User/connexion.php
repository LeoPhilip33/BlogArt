<?php 
require '../header.php'; 
require '../db.php';
require '../controlerSaisies.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

}
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
          <button type="submit" class="btn btn-info">Se connecter !</button>
        </div>
      </form>
    </div>            
  </div>
</div>

<?php
  require '../footer.php';
?>