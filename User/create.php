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
      <form class="container-contact-us" action="action-create.php" method="POST"> <!-- Si le formulaire est activé, on redirige vers action-create.php -->
        <div class="form-group">
            <?php
            $error = "";
            $error = $_POST['error'];
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
<?php require '../footer.php'; ?> <!-- Va chercher le fichier footer.php -->