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
    $LibTitrA = (ctrlSaisies($_POST['LibTitrA']));
    $LibChapoA = (ctrlSaisies($_POST['LibChapoA']));
    $LibAccrochA = (ctrlSaisies($_POST['LibAccrochA']));
    $Parag1A = (ctrlSaisies($_POST['Parag1A']));
    $LibSsTitr1 = (ctrlSaisies($_POST['LibSsTitr1']));
    $Parag2A = (ctrlSaisies($_POST['Parag2A']));
    $LibSsTitr2 = (ctrlSaisies($_POST['LibSsTitr2']));
    $Parag3A = (ctrlSaisies($_POST['Parag3A']));
    $LibConclA = (ctrlSaisies($_POST['LibConclA']));
    $UrlPhotA = (ctrlSaisies($_POST['UrlPhotA']));
    $Likes = 0;
    $NumAngl = (ctrlSaisies($_POST['NumAngl']));
    $NumThem = (ctrlSaisies($_POST['NumThem']));
    $NumLang = (ctrlSaisies($_POST['NumLang']));

    echo "<br>"."Premier echo : ".$NumArt." ".$DtCreA." ".$LibTitrA." ".$LibChapoA." ".$LibAccrochA." ".$Parag1A." ".$LibSsTitr1." ".$Parag2A." ".$LibSsTitr2." ".$Parag3A." ".$LibConclA." ".$UrlPhotA." ".$Likes." ".$NumAngl." ".$NumThem." ".$NumLang."<br><br>";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $requete = "SELECT MAX(NumArt) AS NumArt FROM ARTICLE";
      $result = $connection->query($requete);
      $tuple = $result->fetch();
      $tuple = end($tuple);
      $tuple = (int)$tuple;
      $tuple++;
      $NumArt = $tuple;


      $nomOrigine = $_FILES['monfichier']['name'];
      $elementsChemin = pathinfo($nomOrigine);
      $extensionFichier = $elementsChemin['extension'];
      $extensionsAutorisees = array("jpeg", "jpg", "gif");
      if (!(in_array($extensionFichier, $extensionsAutorisees))) {
          echo "Le fichier n'a pas l'extension attendue";
      } else {    
          // Copie dans le repertoire du script avec un nom
          // incluant l'heure a la seconde pres 
          $repertoireDestination = "../IlluArticles/";
          $nomDestination = "illu_art_".$NumArt.".".$extensionFichier;

          if (move_uploaded_file($_FILES["monfichier"]["tmp_name"], 
                                          $repertoireDestination.$nomDestination)) {
              echo "Le fichier temporaire ".$_FILES["monfichier"]["tmp_name"].
                      " a été déplacé vers ".$repertoireDestination.$nomDestination;
          } else {
              echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
                      "Le déplacement du fichier temporaire a échoué".
                      " vérifiez l'existence du répertoire ".$repertoireDestination;
          }
      }
      $UrlPhotA = "../IlluArticles/".$nomDestination;


















    $erreur = false;

    $DtCreA = date("Y-m-d");
    $DtCreAd = date("H-i-s");
    $DtCreA = $DtCreA." ".$DtCreAd;
    
    echo "<br>"."Deuxieme echo : ".$NumArt." ".$DtCreA." ".$LibTitrA." ".$LibChapoA." ".$LibAccrochA." ".$Parag1A." ".$LibSsTitr1." ".$Parag2A." ".$LibSsTitr2." ".$Parag3A." ".$LibConclA." ".$UrlPhotA." ".$Likes." ".$NumAngl." ".$NumThem." ".$NumLang."<br><br>";
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
      $connection->commit();
      $query->closeCursor();
    }
    catch (PDOException $e) {
      die('Failed to insert Commentaire : ' . $e->getMessage());
      $connection->rollBack();
    }
    try {
      $connection->beginTransaction();
      $Col1_Array = $_POST['MotsCleSelect'];
      foreach($Col1_Array as $NumMoCle){ //affichage des valeurs sélectionnées
        echo "<br>"."Echo Mot cle : ".$NumArt." ".$NumMoCle."<br><br>";
        $query = $connection->prepare("INSERT INTO motclearticle (NumArt, NumMoCle) VALUES (:NumArt, :NumMoCle)");
        $query->execute(array(':NumArt' => $NumArt, ':NumMoCle' => $NumMoCle));
      }
      $connection->commit();
      $query->closeCursor();
      header("Location:sent.php?id=".$NumArt);
    }
    catch (PDOException $e) {
      die('Failed to insert Commentaire : ' . $e->getMessage());
      $connection->rollBack();
    }
  }
?>
