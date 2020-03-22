<?php
require '../../db.php';
require '../../header.php';

$id = $_GET['id'];

$sql = "SELECT * FROM article WHERE NumArt = '$id'";
$statement = $connection->prepare($sql);
$statement->execute();
$articles = $statement->fetch();

$DtCreA = $articles['DtCreA'];
$Likes = $articles['Likes'];
$LibTitrA = $articles['LibTitrA'];
$LibChapoA = $articles['LibChapoA'];
$LibAccrochA = $articles['LibAccrochA'];
$Parag1A = $articles['Parag1A'];
$LibSsTitr1 = $articles['LibSsTitr1'];
$Parag2A = $articles['Parag2A'];
$LibSsTitr2 = $articles['LibSsTitr2'];
$Parag3A = $articles['Parag3A'];
$LibConclA = $articles['LibConclA'];
$UrlPhotA = $articles['UrlPhotA'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
</head>
<body>
    <div class="container"> <!-- Code bootstrap -->
        <div class="card mt-5 bkcard">
                <?php echo $_GET['id'];?>
                <h2><?= $LibTitrA ?></h2><br>
                <div style="width:30px; height:30px; background-color:black;"></div>
                <p><?= $DtCreA ?></p><br>
                <form method="POST">
                    <button type="submit" name="jaime" class="btn btn-primary">J'aime</button>
                </form>
                <?php
                if(isset($_POST["jaime"])){
                    $Likes++;
                    $sql = "UPDATE article SET Likes=:Likes WHERE NumArt = '$id'"; // Mise en place de l'Update
                    $statement = $connection->prepare($sql); // Préparation de sql
                    $go = $statement->execute([':Likes' => $Likes]);
                    }
                ?>
                <p><?= $Likes ?></p><br>
                <p><?= $LibChapoA ?></p><br>
                <p><?= $LibAccrochA ?></p><br>
                <p><?= $Parag1A ?></p><br>
                <h3><?= $LibSsTitr1 ?></h3><br>
                <p><?= $Parag2A ?></p><br>
                <h3><?= $LibSsTitr2 ?></h3><br>
                <p><?= $Parag3A ?></p><br>
                <p><?= $LibConclA ?></p><br>
                <p><?= $UrlPhotA ?></p><br>
        </div>
</div>
</body>
</html>
