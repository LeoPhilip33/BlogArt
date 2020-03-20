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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
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