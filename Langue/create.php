<?php require 'header.php'; 
  require 'db.php';
?>
<?php
  $NumPays = "";
  $frPays = "";   
?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <h2>Ajoutez une langue</h2>
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
            <input type="hidden" id="idTypPays" name="idTypPays" value="<?php echo $NumPays; ?>" />
						<select size="1" name="TypPays" id="TypPays"  class="form-control form-control-create" tabindex="30" >
<?php 
            $NumPays = "";
            $frPays = "";  

            // 2. Preparation requete NON PREPAREE
            // Récupération de l'occurrence pays à partir de l'id
            $queryText = 'SELECT * FROM PAYS';

            // 3. Lancement de la requete SQL
            $result = $connection->query($queryText);

            // S'il y a bien un resultat
            if ($result) {
                // Parcours chaque ligne du resultat de requete
                // Récupération du résultat de requête
                    while ($tuple = $result->fetch()) {
                        $ListnumPays = $tuple["numPays"];
                        $ListfrPays = $tuple["frPays"];
                        echo $ListfrPays;
?>
                        <option value="<?= $ListnumPays; ?>" >
                            <?php echo $ListfrPays; ?>
                        </option>
<?php 
                    } // End of while
            }   // if ($result)
?>
          </select>
				  <span class="line"></span>            
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Ajouter une langue</button>
        </div>
      </form>
    </div>            
  </div>
</div>
<?php require 'footer.php'; ?> <!-- Va chercher le fichier footer.php -->