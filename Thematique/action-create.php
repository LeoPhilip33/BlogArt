<?php 

include 'db.php';
include 'themadd.php';

	function ctrlSaisies($saisie) {

	  // Suppression des espaces (ou d'autres caractères) en début et fin de chaîne
	  $saisie = trim($saisie);
	  // Suppression des antislashs d'une chaîne
	  $saisie = stripslashes($saisie);
	  // Conversion des caractères spéciaux en entités HTML 
	  $saisie = htmlentities($saisie);

	  return $saisie;
	}
      
$LibMoCle = $_POST['LibMoCle'];
$TypPays = $_POST['TypPays'];

echo "Informations reçus : ".$LibMoCle." ".$TypPays;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<br/>Passage de condition 1 : ".$LibMoCle." ".$TypPays;

  $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    echo "<br>"."Passage de condition2 : ".$LibMoCle." ".$TypPays;

    $NumLang = 0;

    $LibMoCle = (ctrlSaisies($_POST["LibMoCle"]));
    $TypPays = (ctrlSaisies($_POST["TypPays"]));

// Appel getNextNumMoCle() : récup next PK NumMoCle
$NumMoCle = getNextNumThem($NumLang);

    try {
      $connection->beginTransaction();
      echo "<br>"."Dernier echo avant le SEND : ".$LibMoCle." ".$TypPays;
      $query = $connection->prepare("INSERT INTO thematique (NumThem, LibThem, NumLang) VALUES (:NumMoCle, :LibMoCle, :TypPays)");
      /// Coller ici 

      $query->execute(
        array(
          ':NumMoCle' => $NumMoCle,
          ':LibMoCle' => $LibMoCle,
          ':TypPays' => $TypPays
        )
      );

      $connection->commit();

      $query->closeCursor();

      header("Location:index.php?#Langues");
    }
    catch (PDOException $e) {
      die('Failed to insert Article : ' . $e->getMessage());
      $connection->rollBack();
    }
}

?>

</body>
</html>