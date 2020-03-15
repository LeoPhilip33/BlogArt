<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <h2>Ajoutez une thématique</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?> <!-- Si $message n'est pas vide -->
        <div class="alert alert-success"> <!-- Alerte succes -->
          <?= $message; ?> <!-- Echo de $message -->
        </div>
      <?php endif; ?>
      <form class="container-contact-us" action="action-create.php" method="POST"> <!-- Si le formulaire est activé, on redirige vers action-create.php -->
        <div class="form-group">
            <span class="span-text">Libellé court</span> 
            <input class="form-control" type="text" name="Lib1Lang" maxlength="25" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé long</span>
            <input class="form-control"type="text" name="Lib2Lang" maxlength="45" required>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Quel pays</span>
						<input class="form-control" type="text" name="NumPays" maxlength="4" required>
						<span class="line"></span>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Ajouter une thématique</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?> <!-- Va chercher le fichier footer.php -->