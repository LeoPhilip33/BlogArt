<?php
require '../db.php';
$NumAngl="";
$NumThem="";
$NumLang="";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../script_global.js"></script>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Rédiger Article</title>
</head>
    <body>
        <?php require '../Require_php/Illustration_header.php'; ?><!--header-->
        <?php require '../Require_php/barnav.php'; ?><!--navbar-->
        <div class="content">
        <div class="fichecontact">
        <h3 class="titrecont">Rédiger Article</h3>
            <div class="monformlaire">
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
                <input type="hidden" name="NumAngl" value="<?php echo $NumAngl; ?>" />
                <select size="1" name="NumAngl" id="SlectBox"  class="form-control form-control-create" tabindex="30" >
                <?php 
                $NumAngl="";
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
                <input type="hidden"name="NumThem" value="<?php echo $NumThem; ?>" />
                <select size="1" name="NumThem" id="SlectBox"  class="form-control form-control-create SlectBox" tabindex="30" >
                <?php 
                $NumThem="";
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
            <div class="form-group">
                <span class="span-text">Langue</span>
                <input type="hidden"name="NumLang" value="<?php echo $NumLang; ?>" />
                <select size="1" name="NumLang" id="SlectBox"  class="form-control form-control-create SlectBox" tabindex="30" >
                <?php 
                $NumLang="";
                // 2. Preparation requete NON PREPAREE
                // Récupération de l'occurrence pays à partir de l'id
                $queryText = 'SELECT * FROM langue';

                // 3. Lancement de la requete SQL
                $result = $connection->query($queryText);

                // S'il y a bien un resultat
                if ($result) {
                    // Parcours chaque ligne du resultat de requete
                    // Récupération du résultat de requête
                        while ($tuple = $result->fetch()) {
                        $ListnumPays = $tuple["NumLang"];
                        $ListfrPays = $tuple["Lib1Lang"];
                        echo '<option value="' .$ListnumPays. '">' .$ListfrPays. '</option>';
                    } // End of while
                }   // if ($result)
                ?>
                </select>
            </div>
                <div class="selectmotcle">
                    <div class="list1">

                        <span class="span-text">Mots clés disponibles</span>
                        <select class="form-control" id ="features" name="Features[]" multiple="multiple" style="height:200px;">
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



                    </div>
                    <div class="btnsaddsuppr">
                        <div class="input-group btnadd">
                            <button type="button" value="" class="btn btn-xs btn-primary" id="add">Ajouter >></button>
                        </div>
                        <div class="input-group btnspr">
                            <button type="button" value="" class="btn btn-xs btn-danger" id="remove"><< Supprimer</button> 
                        </div>
                    </div>
                    <div class="list2">
                        <span class="span-text">Mots clés ajoutés</span>
                        <select class="form-control" name="MotsCleSelect[]" required size="9" id="selected_features" multiple="multiple" style="height:200px;">
                        </select>
                    </div>
                </div>
            <script type="text/javascript">
                $(document).ready(function(){
                $('#add').click(function() {  
                    return !$('#features option:selected')
                .remove().appendTo('#selected_features');  
                });  
                $('#remove').click(function() {  
                    return !$('#selected_features option:selected')
                .remove().appendTo('#features');  
                });  
                    
                function selectall()  {  
                $('#selected_features').find('option').each(function() {  
                $(this).attr('selected', 'selected');  
                });  
                }  
                });
            </script>
            <div class="form-group">
            <button type="submit" value="submit" class="btn btn-info">Ajouter l'article</button>
            </div>
        </form>
        </div>



            <div class="icons">
            <a href="https://twitter.com/BordHorry" target="_blank"> <img src="../images/twitter.png" class="icon" alt="Logo de twitter" > </a>
            <a href="https://medium.com/@horry.bord" target="_blank"> <img src="../images/medium.png" class="icon" alt="Logo de medium"> </a>
            <a href="https://www.instagram.com/horry_bord/" target="_blank"> <img src="../images/instagram.png" class="icon" alt="Logo d'instagram"> </a>
            </div>
        </div>
        <div class="barlat"></div>
    </div>
        <?php require '../Require_php/footer.php'; ?>
    </body>
</html>
