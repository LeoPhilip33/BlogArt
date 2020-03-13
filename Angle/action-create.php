<html>
<head>
	<title></title>
</head>
<body>
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
	      $bdPdo = new PDO("mysql:dbname=$nomBD;host=$hostBD;charset=utf8", $userBD, $passBD);
	      $bdPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} 
	  catch (PDOException $error) {
	    die('Failed to connect : ' . $error->getMessage());
	}


$NumLang = "";
$Lib1Lang = "";
$NumPays = "";

$Lib1Lang = $_POST['LibAngl'];
$NumPays = $_POST['NumLang'];

echo "Informations reçus : ".$Lib1Lang." ".$NumPays;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<br/>Passage de condition 1 : ".$Lib1Lang." ".$NumPays;

  $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    echo "<br>"."Passage de condition2 : ".$Lib1Lang." ".$NumPays;

    $erreur = false;
    $NumLang = 0;

    $Lib1Lang = (ctrlSaisies($_POST["LibAngl"]));
    $numPays = (ctrlSaisies($_POST["NumLang"]));

    $numPaysSelect = $numPays;
    $parmNumLang = $numPaysSelect . '%';
    $requete = "SELECT MAX(NumAngl) AS NumAngl FROM angle WHERE NumAngl LIKE '$parmNumLang';";

    $result = $bdPdo->query($requete);

    $numSeqLang = 0;

    if ($result) {
      $tuple = $result->fetch();
      $NumLang = $tuple["NumAngl"];
      if (is_null($NumLang)) {
        $NumLang = 0;
        $StrLang = $numPaysSelect;
      }
      else {
        $NumLang = $tuple["NumAngl"];
        $StrLang = substr($NumLang, 0, 4);
        $numSeqLang = (int)substr($NumLang, 4);
      }

      $numSeqLang++;

      if ($numSeqLang < 10) {
        $NumLang = $StrLang . "0" . $numSeqLang;
      }
      else {
        $NumLang = $StrLang . $numSeqLang;
      }
      echo "Affichage de NumSeq : ". $numSeqLang;
    }

    try {
      $bdPdo->beginTransaction();

      echo "<br>"."Dernier echo avant le SEND : ".$Lib1Lang." ".$NumPays."</br>" ;
      $query = $bdPdo->prepare("INSERT INTO angle (NumAngl, LibAngl, NumLang) VALUES (:NumAngl, :LibAngl, :NumLang)");

      $query->execute(
        array(
          ':NumLang' => $NumLang,
          ':Lib1Lang' => $Lib1Lang, 
          ':numPays' => $numPays
        )
      );

      $langid = $NumLang;

      echo $NumLang, $Lib1Lang, $Lib2Lang, $numPays ;

      $bdPdo->commit();

      $query->closeCursor();

      header("Location:index.php?#Langues");
}
    catch (PDOException $e) {
      die('Failed to insert Article : ' . $e->getMessage());
      $bdPdo->rollBack();
    }
  

}

	

?>




</body>
</html>