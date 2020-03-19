<<<<<<< HEAD
<?php 
require 'header.php';
require '../db.php';
?>
=======
<?php require '../header.php'; ?>
>>>>>>> ba2af05b46612aecc168ac012e2d00e1731d237d
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
            <input class="form-control" type="text" name="LibTitrA" maxlength="100" placeholder="100 caractères maximum" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span 
            class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Url illustration</span> 
            <input class="form-control" type="text" name="UrlPhotA" maxlength="62" placeholder="62 caractères maximum" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span 
            class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé chapeau</span> 
            <textarea class="form-control" type="text" name="LibChapoA" rows="3" placeholder="500 caractères maximum" maxlength="500" required></textarea>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé Accroche</span>
            <input class="form-control" type="text" name="LibAccrochA" maxlength="100" placeholder="100 caractères maximum" required>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé paragraphe 1</span>
            <textarea class="form-control" type="text" name="Parag1A" rows="3" placeholder="1200 caractères maximum" maxlength="1200" required></textarea>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé sous-titre 1</span> 
            <input class="form-control" type="text" name="LibSsTitr1" maxlength="100" placeholder="100 caractères maximum" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé paragraphe 2</span>
            <textarea class="form-control" type="text" name="Parag2A" rows="3" placeholder="1200 caractères maximum" maxlength="1200" required></textarea>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé sous-titre 2</span> 
            <input class="form-control" type="text" name="LibSsTitr2" maxlength="100" placeholder="100 caractères maximum" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé paragraphe 3</span>
            <textarea class="form-control" type="text" name="Parag3A" rows="3" maxlength="1200" placeholder="1200 caractères maximum" required></textarea>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé conclusion</span>
            <textarea class="form-control" type="text" name="LibConclA" rows="3" maxlength="800" placeholder="800 caractères maximum" required></textarea>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Angle</span>
            <input type="hidden" id="idTypPays" name="idTypPays" value="<?php echo $NumAngl; ?>" />
            <select size="1" name="TypPays" id="TypPays"  class="form-control form-control-create" tabindex="30" >
              <?php 
              // 2. Preparation requete NON PREPAREE
              // Récupération de l'occurrence pays à partir de l'id
              $queryText = 'SELECT * FROM angle';

              // 3. Lancement de la requete SQL
              $result = $connection->query($queryText);

              // S'il y a bien un resultat
              if ($result) {
                  // Parcours chaque ligne du resultat de requete
                  // Récupération du résultat de requête
                    while ($tuple = $result->fetch()) {
                      $ListnumPays = $tuple["NumAngl"];
                      $ListfrPays = $tuple["LibAngl"];
                      echo '<option value="' .$ListnumPays. '">' .$ListfrPays. '</option>';
                  } // End of while
              }   // if ($result)
              ?>
            </select>
        </div>
        <div class="form-group">
            <span class="span-text">Thèmatique</span>
            <input type="hidden" id="idTypPays" name="idTypPays" value="<?php echo $NumAngl; ?>" />
            <select size="1" name="TypPays" id="TypPays"  class="form-control form-control-create" tabindex="30" >
              <?php 
              // 2. Preparation requete NON PREPAREE
              // Récupération de l'occurrence pays à partir de l'id
              $queryText = 'SELECT * FROM thematique';

              // 3. Lancement de la requete SQL
              $result = $connection->query($queryText);

              // S'il y a bien un resultat
              if ($result) {
                  // Parcours chaque ligne du resultat de requete
                  // Récupération du résultat de requête
                    while ($tuple = $result->fetch()) {
                      $ListnumPays = $tuple["NumThem"];
                      $ListfrPays = $tuple["LibThem"];
                      echo '<option value="' .$ListnumPays. '">' .$ListfrPays. '</option>';
                  } // End of while
              }   // if ($result)
              ?>
            </select>
        </div>
        <span class="span-text">Mots clés</span>
        <div class="form-group">
        <button type="addMo" value="ajouterMo" class="btn btn-info" style>Ajouter mot clé</button>
        <?php
        if(isset($_POST['addMo']) AND $_POST['addMo']=='ajouterMo'){
          require 'addmocle.php';
        } 
        ?>
          
        </div>
        
        <div class="form-group">
          <button type="submit" value="submit" class="btn btn-info">Ajouter l'article</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?> <!-- Va chercher le fichier footer.php -->