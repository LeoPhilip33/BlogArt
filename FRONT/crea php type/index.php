<!DOCTYPE html>
<html>
<head>
    <title>page inscription horry bord</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php require '../Require_php/barnav.php'; ?><!--navbar-->

<div class="container">
    <div class="fiche_creat">
    <div class="formulaire">
    <h3 class="creat_php">Creat PHP type</h3>
    <p class="texte1">Ajouter une langue au répertoire</p>
    <form class="formcont" method="POST">
                <div class="form-group">
                  <label for="libelle_court">Libellé court :</label>
                  <input type="text" name="libelle_court" class="form-control" placeholder="Libellé court" maxlength="45" required>
                </div>
                <div class="form-group">
                  <label for="libelle_long"> Libellé long :</label>
                  <input type="text" name="libelle_long" class="form-control" placeholder="libelle_long" maxlength="100" required>
                </div>
                <div class="form-group">
                  <label for="pays"> Quel pays :</label>
                  <select name="pays" id="pet-select">
                <option value="">--Choisi un pays--</option>
                <option value="dog">Allemagne</option>
                <option value="cat">France</option>
                <option value="hamster">Italie</option>
                <option value="parrot">Royaume-Uni</option>
                <option value="spider">Espagne</option>
                <option value="goldfish">États-Unis</option>
                <option value="goldfish">Japon</option>
                <option value="goldfish">Chine</option>
                <option value="goldfish">Russie</option>
                <option value="goldfish">Finlande</option>
                </select>
                </div>
                
                <button type="add" value="ok"class="btn btn-primary">Ajouter</button>
                </div>
    </form>
   
  <div class="image"> <img src="../images/illustration_connexion.png" alt="" class="illu_connexion"></div>
   </div>

</div>


</body>
</html>