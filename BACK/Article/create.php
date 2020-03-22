<?php 
require '../header.php';
require '../db.php';
?>
<!-- //////////////////////////////////////////////////////////////////////// -->
<?php
function ctrlSaisies($saisie) {

  // Suppression des espaces (ou d'autres caractères) en début et fin de chaîne
  $saisie = trim($saisie);
  // Suppression des antislashs d'une chaîne
  $saisie = stripslashes($saisie);
  // Conversion des caractères spéciaux en entités HTML 
  $saisie = htmlentities($saisie);

  return $saisie;
}

$hostBD = "localhost";
$nomBD = "blogart20";
$userBD = 'root';
$passBD = '';
try {
        $connection = new PDO("mysql:dbname=$nomBD;host=$hostBD;charset=utf8", $userBD, $passBD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } 
    catch (PDOException $error) {
        die('Failed to connect : ' . $error->getMessage());
    }

$NumArt = " ";
$DtCreA = " ";
$LibTitrA = $_POST['LibTitrA'];
$LibChapoA = $_POST['LibChapoA'];
$LibAccrochA = $_POST['LibAccrochA'];
$Parag1A = $_POST['Parag1A'];
$LibSsTitr1 = $_POST['LibSsTitr1'];
$Parag2A = $_POST['Parag2A'];
$LibSsTitr2 = $_POST['LibSsTitr2'];
$Parag3A = $_POST['Parag3A'];
$LibConclA = $_POST['LibConclA'];
$UrlPhotA = $_POST['UrlPhotA'];
$Likes = 0;
$NumAngl = " ";
$NumThem = " ";
$NumLang = $_POST['NumLang'];

if (isset($_POST['Submit'])) {

  // $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
  $erreur = false;
  $NumLang = 0;

  $PseudoAuteur = (ctrlSaisies($_POST["PseudoAuteur"]));
  $EmailAuteur = (ctrlSaisies($_POST["EmailAuteur"]));
  $TitrCom = (ctrlSaisies($_POST["TitrCom"]));
  $LibCom = (ctrlSaisies($_POST["LibCom"]));

  $requete = "SELECT MAX(NumArt) AS NumArt FROM ARTICLE";
  $result = $connection->query($requete);
  $tuple = $result->fetch();
  $tuple = (int)end($tuple);
  $tuple++;
  $NumArt = $tuple;

  $DtCreA = date("Y-m-d");
  $DtCreAd = date("H-i-s");
  $DtCreA = $DtCreA." ".$DtCreAd;
  $requete = "SELECT MAX(NumAngl) AS NumAngl FROM ANGLE";
  $result = $connection->query($requete);
  $tuple = $result->fetch();
  $tuple = explode("L", $tuple);
  $tuple = $tuple[1];
  echo $tuple;
  $tuple = (int)end($tuple);
  $tuple++;
  if( $tuple < 1000){
    $NumAngl = "ANGL0".$tuple;
  }else{
    $NumAngl = "ANGL".$tuple;
  }
  echo $NumAngl;

  // $NumAngl = $tuple;
  // $requete = "SELECT MAX(NumThem) AS NumThem FROM THEMATQUE";
  // $result = $connection->query($requete);
  // $tuple = $result->fetch();
  // $tuple = explode("E", $tuple);
  // $tuple = $tuple[1];
  // $tuple = (int)end($tuple);
  // $tuple++;
  // if( $tuple < 1000){
  //   $tuple = "THE0".$tuple;
  // }else{
  //   $tuple = "THE".$tuple;
  // }
  // $NumAngl = $tuple;
  
  try {
    $connection->beginTransaction();

    echo "<br>"."Dernier echo avant le SEND : ".$NumArt." ".$DtCreA." ".$LibTitrA." ".$LibChapoA." ".$LibAccrochA." ".$Parag1A." ".$LibSsTitr1." ".$Parag2A." ".$LibSsTitr2." ".$Parag3A." ".$LibConclA." ".$UrlPhotA." ".$Likes." ".$NumAngl." ".$NumThem." ".$NumLang."<br><br>";
    $query = $connection->prepare("INSERT INTO ARTICLE (NumArt, DtCreA, LibTitrA, LibChapoA, LibAccrochA, Parag1A, LibSsTitr1, Parag2A, LibSsTitr2, Parag3A, LibConclA, UrlPhotA, Likes, NumAngl, NumThem, NumLang) VALUES (:NumArt, :DtCreA, :LibTitrA, :LibChapoA, :LibAccrochA, :Parag1A, :LibSsTitr1, :Parag2A, :LibSsTitr2, :Parag3A, :LibConclA, :UrlPhotA, :Likes, :NumAngl, :NumThem, :NumLang)");

    $query->execute(
      array(
        ':NumArt' => $NumArt,
        ':DtCreA' => $DtCreA, 
        ':LibTitrA' => $LibTitrA,
        ':LibChapoA' => $LibChapoA,
        ':LibAccrochA' => $LibAccrochA,
        ':Parag1A' => $Parag1A,
        ':LibSsTitr1' => $LibSsTitr1,
        ':Parag2A' => $Parag2A,
        ':LibSsTitr2' => $LibSsTitr2,
        ':Parag3A' => $Parag3A,
        ':LibConclA' => $LibConclA,
        ':UrlPhotA' => $UrlPhotA,
        ':Likes' => $Likes,
        ':NumAngl' => $NumAngl,
        ':NumThem' => $NumThem,
        ':NumLang' => $NumLang
      )
    );

    $langid = $NumCom;

    

    $connection->commit();

    $query->closeCursor();
  }
  catch (PDOException $e) {
    die('Failed to insert Commentaire : ' . $e->getMessage());
    $connection->rollBack();
  }
}

?>



<!-- //////////////////////////////////////////////////////////////////////////////////////: -->

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
      <form class="container-contact-us" method="POST"> <!-- Si le formulaire est activé, on redirige vers action-create.php -->
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
            <select size="1" name="SlectBox" id="SlectBox"  class="form-control form-control-create SlectBox" tabindex="30" >
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
        <?php require 'addmocle.php'; ?>
        <select id='custom-headers' multiple='multiple'>
          <option value='elem_1' selected>elem 1</option>
          <option value='elem_2'>elem 2</option>
          <option value='elem_3'>elem 3</option>
          <option value='elem_4' selected>elem 4</option>
          <option value='elem_100'>elem 100</option>
        </select>
        </div>
        <div class="form-group">
          <button type="submit" value="submit" class="btn btn-info">Ajouter l'article</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?> <!-- Va chercher le fichier footer.php -->
