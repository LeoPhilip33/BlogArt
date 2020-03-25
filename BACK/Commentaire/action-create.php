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

$NumCom = "";
$DtCreC = "";
$PseudoAuteur = "";
$EmailAuteur = "";
$TitrCom = "";
$LibCom = "";

$PseudoAuteur = $_POST['PseudoAuteur'];
$EmailAuteur = $_POST['EmailAuteur'];
$TitrCom = $_POST['TitrCom'];
$LibCom = $_POST['LibCom'];
$NumArt = $_POST['quelart'];
echo $quelart;
echo "Informations reçus : ".$PseudoAuteur." ".$EmailAuteur." ".$TitrCom." ".$LibCom;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<br/>Passage de condition 1 : ".$PseudoAuteur." ".$EmailAuteur." ".$TitrCom." ".$LibCom;

    $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    echo "<br>"."Passage de condition2 : ".$PseudoAuteur." ".$EmailAuteur." ".$TitrCom." ".$LibCom;

    $erreur = false;
    $NumLang = 0;

    $PseudoAuteur = (ctrlSaisies($_POST["PseudoAuteur"]));
    $EmailAuteur = (ctrlSaisies($_POST["EmailAuteur"]));
    $TitrCom = (ctrlSaisies($_POST["TitrCom"]));
    $LibCom = (ctrlSaisies($_POST["LibCom"]));

    $requete = "SELECT MAX(NumCom) AS NumCom FROM COMMENT";

    $result = $connection->query($requete);
    
    $tuple = $result->fetch();
    $tuple = (int)end($tuple);
    $tuple++;
    $NumCom = $tuple;
    $DtCreC = date("Y-m-d");
    $DtCreCd = date("H-i-s");
    $DtCreC = $DtCreC." ".$DtCreCd;

    try {
      $connection->beginTransaction();

      echo "<br>"."Dernier echo avant le SEND : ".$NumCom." ".$DtCreC." ".$PseudoAuteur." ".$EmailAuteur." ".$TitrCom." ".$LibCom." ".$NumArt."<br><br>";
      $query = $connection->prepare("INSERT INTO COMMENT (NumCom, DtCreC, PseudoAuteur, EmailAuteur, TitrCom, LibCom, NumArt) VALUES (:NumCom, :DtCreC, :PseudoAuteur, :EmailAuteur, :TitrCom, :LibCom, :NumArt)");

      $query->execute(
        array(
          ':NumCom' => $NumCom,
          ':DtCreC' => $DtCreC, 
          ':PseudoAuteur' => $PseudoAuteur,
          ':EmailAuteur' => $EmailAuteur,
          ':TitrCom' => $TitrCom,
          ':LibCom' => $LibCom,
          ':NumArt' => $NumArt
        )
      );

      $langid = $NumCom;

      echo $NumCom, $DtCreC, $PseudoAuteur, $EmailAuteur, $TitrCom, $LibCom, $NumArt ;

      $connection->commit();

      $query->closeCursor();

      header("Location:index.php");
    }
    catch (PDOException $e) {
      die('Failed to insert Commentaire : ' . $e->getMessage());
      $connection->rollBack();
    }
  

}

	

?>




</body>
</html>