<?php require '../header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <h2>Ajoutez un article</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?> <!-- Si $message n'est pas vide -->
        <div class="alert alert-success"> <!-- Alerte succes -->
          <?= $message; ?> <!-- Echo de $message -->
        </div>
      <?php endif; ?>
      <form class="container-contact-us" action="action-create.php" method="POST"> <!-- Si le formulaire est activé, on redirige vers action-create.php -->
        <div class="form-group">
            <span class="span-text">Titre article</span> 
            <input class="form-control" type="text" name="LibTitrA" maxlength="100" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span 
            class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Url illustration</span> 
            <input class="form-control" type="text" name="UrlPhotA" maxlength="62" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span 
            class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé chapeau</span> 
            <textarea class="form-control" type="text" name="LibChapoA" rows="3" maxlength="500" required></textarea>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé Accroche</span>
            <textarea class="form-control" type="text" name="LibAccrochA" rows="3" maxlength="100" required></textarea>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé paragraphe 1</span>
            <textarea class="form-control" type="text" name="Parag1A" rows="3" maxlength="1200" required></textarea>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé sous-titre 1</span> 
            <input class="form-control" type="text" name="LibSsTitr1" maxlength="100" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé paragraphe 2</span>
            <textarea class="form-control" type="text" name="Parag2A" rows="3" maxlength="1200" required></textarea>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé sous-titre 2</span> 
            <input class="form-control" type="text" name="LibSsTitr2" maxlength="100" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé paragraphe 3</span>
            <textarea class="form-control" type="text" name="Parag3A" rows="3" maxlength="1200" required></textarea>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé conclusion</span>
            <textarea class="form-control" type="text" name="LibConclA" rows="3" maxlength="800" required></textarea>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Quel angle ?</span>
						<input class="form-control" type="text" name="NumLang" maxlength="4" required>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Mot clé</span>
						<input class="form-control" type="text" name="NumLang" maxlength="4" required>
						<span class="line"></span>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Ajouter l'article</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?> <!-- Va chercher le fichier footer.php -->