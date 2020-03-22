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
	        $connection = new PDO("mysql:dbname=$nomBD;host=$hostBD;charset=utf8", $userBD, $passBD);
	        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    } 
	    catch (PDOException $error) {
	        die('Failed to connect : ' . $error->getMessage());
	    }


$NumLang = "";
$Lib1Lang = "";
$Lib2Lang = "";
$NumPays = "";

$Lib1Lang = $_POST['Lib1Lang'];
$Lib2Lang = $_POST['Lib2Lang'];
$NumPays = $_POST['NumPays'];

echo "Informations reçus : ".$Lib1Lang." ".$Lib2Lang." ".$NumPays;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<br/>Passage de condition 1 : ".$Lib1Lang." ".$Lib2Lang." ".$NumPays;

  $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    echo "<br>"."Passage de condition2 : ".$Lib1Lang." ".$Lib2Lang." ".$NumPays;

    $erreur = false;
    $NumLang = 0;

    $Lib1Lang = (ctrlSaisies($_POST["Lib1Lang"]));
    $Lib2Lang = (ctrlSaisies($_POST["Lib2Lang"]));
    $numPays = (ctrlSaisies($_POST["TypPays"]));

    $numPaysSelect = $numPays;
    $parmNumLang = $numPaysSelect . '%';
    $requete = "SELECT MAX(NumLang) AS NumLang FROM LANGUE WHERE NumLang LIKE '$parmNumLang';";

    $result = $connection->query($requete);

    $numSeqLang = 0;

    if ($result) {
      $tuple = $result->fetch();
      $NumLang = $tuple["NumLang"];
      if (is_null($NumLang)) {
        $NumLang = 0;
        $StrLang = $numPaysSelect;
      }
      else {
        $NumLang = $tuple["NumLang"];
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
    }

    try {
      $connection->beginTransaction();

      echo "<br>"."Dernier echo avant le SEND : ".$Lib1Lang." ".$Lib2Lang." ".$StrLang ;
      $query = $connection->prepare("INSERT INTO LANGUE (NumLang, Lib1Lang, Lib2Lang, numPays) VALUES (:NumLang, :Lib1Lang, :Lib2Lang, :numPays)");

      $query->execute(
        array(
          ':NumLang' => $NumLang,
          ':Lib1Lang' => $Lib1Lang, 
          ':Lib2Lang' => $Lib2Lang,
          ':numPays' => $numPays
        )
      );

      $langid = $NumLang;


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