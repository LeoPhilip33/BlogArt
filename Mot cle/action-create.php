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

$LibMoCle = "";
$NumMoCle = "";
$Lib1Lang = "";
$NumLang = "";

$NumMoCle = $_POST['LibMoCle'];
$Lib1Lang = $_POST['TypPays'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';


    $erreur = false;

    $NumMoCle = (ctrlSaisies($_POST["LibMoCle"]));
    $Lib1Lang = (ctrlSaisies($_POST["TypPays"]));
    echo $NumMoCle;
    echo " ";
    echo $Lib1Lang  ;

    $numPaysSelect = $Lib1Lang;
    $parmNumLang = $numPaysSelect . '%';
    $requete = "SELECT NumLang FROM LANGUE WHERE NumLang='$parmNumLang';";
    $result = $connection->query($requete);
    $tuple = $result->fetch();
    echo $tuple;

    try {
      $connection->beginTransaction();

      echo "<br>"."Dernier echo avant le SEND : ".$NumMoCle." ".$LibMoCle." ".$NumLang ;
      $query = $connection->prepare("INSERT INTO MOTCLE (NumMoCle, LibMoCle, NumLang) VALUES (:NumMoCle, :LibMoCle, :NumLang)");

      $query->execute(
        array(
          ':NumMoCle' => $NumMoCle,
          ':LibMoCle' => $LibMoCle,
          ':NumLang' => $NumLang
        )
      );

      $langid = $NumLang;


      $connection->commit();

      $query->closeCursor();

      header("Location:index.php?");
    }
    catch (PDOException $e) {
      die('Failed to insert Article : ' . $e->getMessage());
      $connection->rollBack();
    }
  

}

	

?>




</body>
</html>