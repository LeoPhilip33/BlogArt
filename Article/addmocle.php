<?php
require '../db.php';
?>
<div class="form-group">
    <input type="hidden" id="idTypPays" name="idTypPays" value="<?php echo $NumAngl; ?>" />
    <select size="1" name="TypPays" id="TypPays"  class="form-control form-control-create" tabindex="30" >
        <?php 
        // 2. Preparation requete NON PREPAREE
        // Récupération de l'occurrence pays à partir de l'id
        $queryText = 'SELECT * FROM motcle';

        // 3. Lancement de la requete SQL
        $result = $connection->query($queryText);

        // S'il y a bien un resultat
        if ($result) {
            // Parcours chaque ligne du resultat de requete
            // Récupération du résultat de requête
            while ($tuple = $result->fetch()) {
                $ListnumPays = $tuple["NumMoCle"];
                $ListfrPays = $tuple["LibMoCle"];
                echo '<option value="' .$ListnumPays. '">' .$ListfrPays. '</option>';
            } // End of while
        }   // if ($result)
        ?>
    </select>
    <button type="button" class="btn btn-danger" style>Supprimer le menu déroulant</button>
</div>