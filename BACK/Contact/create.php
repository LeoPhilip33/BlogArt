<?php 
require '../header.php';
require '../db.php';
?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <h2>Contact</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?> <!-- Si $message n'est pas vide -->
        <div class="alert alert-success"> <!-- Alerte succes -->
          <?= $message; ?> <!-- Echo de $message -->
        </div>
      <?php endif; ?>
      <form action="sendmail.php" method="POST">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" required>
          </div>
          <div class="form-group col-md-6">
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" required>
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" id="email" name="email" class="form-control" placeholder="Adresse Email" required>
        </div>
        <div class="form-group">
          <label for="objet">Objet:</label>
          <input type="text" id="objet" name="objet" class="form-control" placeholder="Objet" required>
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea class="form-control" id="message" name="message" rows="5" placeholder="..." required></textarea>
        </div>
        <div class="form-group">
        <button type="envoyer" value="ok"class="btn btn-primary">Envoyer</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?> <!-- Va chercher le fichier footer.php -->