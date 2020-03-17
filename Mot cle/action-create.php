<?php 

include 'db.php';
include 'motcleadd.php';

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
$idTypPays = $_POST['idTypPays'];

echo "Informations reçus : ".$LibMoCle." ".$idTypPays;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<br/>Passage de condition 1 : ".$LibMoCle." ".$idTypPays;

  $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    echo "<br>"."Passage de condition2 : ".$LibMoCle." ".$idTypPays;

    $NumLang = 0;

    $LibMoCle = (ctrlSaisies($_POST["LibMoCle"]));
    $idTypPays = (ctrlSaisies($_POST["idTypPays"]));

// Appel getNextNumMoCle() : récup next PK NumMoCle
$NumMoCle = getNextNumMoCle($NumLang);

    try {
      $connection->beginTransaction();

      echo "<br>"."Dernier echo avant le SEND : ".$LibMoCle." ".$idTypPays." ".$NumLang ;
      /// Coller ici 

      $query->execute(
        array(
          ':NumMoCle' => $NumMoCle,
          ':LibMoCle' => $LibMoCle,
          ':idTypPays' => $NumLang,
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