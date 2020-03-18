<?php require 'header.php';
require '../db.php';
$NumPays = " ";
?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <h2>Ajoutez un commentaire</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?> <!-- Si $message n'est pas vide -->
        <div class="alert alert-success"> <!-- Alerte succes -->
          <?= $message; ?> <!-- Echo de $message -->
        </div>
      <?php endif; ?>
      <form class="container-contact-us" action="action-create.php" method="POST"> <!-- Si le formulaire est activé, on redirige vers action-create.php -->
        <div class="form-group">
            <span class="span-text">Pseudo</span> 
            <input class="form-control" type="text" name="PseudoAuteur" maxlength="25" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Email</span> 
            <input class="form-control" type="text" name="EmailAuteur" maxlength="25" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Titre</span> 
            <input class="form-control" type="text" name="TitrCom" maxlength="25" required> <!-- Définition du taille max et impose à se que le champ soit complété -->
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Libellé</span>
            <input class="form-control"type="text" name="LibCom" maxlength="45" required>
						<span class="line"></span>
        </div>
        <div class="form-group">
            <span class="span-text">Quel Article?</span>
            <input type="hidden" id="idTypPays" name="idTypPays" value="<?php echo $NumPays; ?>" />
						<select size="1" name="quelart" id="TypPays"  class="form-control form-control-create" tabindex="30" >
<?php 
            $NumPays = "";
            $frPays = "";  

            // 2. Preparation requete NON PREPAREE
            // Récupération de l'occurrence pays à partir de l'id
            $queryText = 'SELECT * FROM article';

            // 3. Lancement de la requete SQL
            $result = $connection->query($queryText);

            // S'il y a bien un resultat
            if ($result) {
                // Parcours chaque ligne du resultat de requete
                // Récupération du résultat de requête
                    while ($tuple = $result->fetch()) {
                        $Listnumart = $tuple["NumArt"];
                        $Listart = $tuple["LibTitrA"];
                        echo $ListfrPays;
?>
                        <option value="<?= $Listnumart; ?>" >
                            <?php echo $Listnumart."|".$Listart; ?>
                        </option>
<?php 
                    } // End of while
            }   // if ($result)
?>
          </select>
				  <span class="line"></span>            
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Ajouter le commentaire</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?> <!-- Va chercher le fichier footer.php -->