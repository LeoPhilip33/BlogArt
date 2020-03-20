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

$Identifiant = $_POST['Identifiant'];
$mdp = $_POST['mdp'];
$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$Email = $_POST['Email'];

echo "Informations reçus : ".$Identifiant." ".$mdp." ".$Nom." ".$Prenom." ".$Email;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<br/>Passage de condition 1 : ".$Identifiant." ".$mdp." ".$Nom." ".$Prenom." ".$Email;

  $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    echo "<br>"."Passage de condition2 : ".$Identifiant." ".$mdp." ".$Nom." ".$Prenom." ".$Email;

    $erreur = false;
    $NumLang = 0;

    $Identifiant = (ctrlSaisies($_POST["Identifiant"]));
    $mdp = (ctrlSaisies($_POST["mdp"]));
    $Nom = (ctrlSaisies($_POST["Nom"]));
    $Prenom = (ctrlSaisies($_POST["Prenom"]));
    $Email = (ctrlSaisies($_POST["Email"]));

    $sql = 'SELECT * FROM user'; // Met dans la varaible toute la sélection de la table langue
    $statement = $connection->prepare($sql);
    $statement->execute();
    $user = $statement->fetchAll(PDO::FETCH_OBJ);
    session_start ();
    foreach($user as $row):     
      $user = $row->Login;
      echo $user."<br>";
      if($user == $Identifiant){
        echo "Erreur ! L'identifiant ou le mot de passe existe déja !";
        $error = "Erreur ! L'identifiant ou le mot de passe existe déja !";
      }
    endforeach;

    try {
      $connection->beginTransaction();

      $query = $connection->prepare("INSERT INTO user (Login, Pass, LastName, FirstName, EMail) VALUES (:Identifiant, :mdp, :Nom, :Prenom, :Email)");

      $query->execute(
        array(
          ':Identifiant' => $Identifiant,
          ':mdp' => $mdp, 
          ':Nom' => $Nom,
          ':Prenom' => $Prenom,
          ':Email' => $Email
        )
      );

      $connection->commit();

      $query->closeCursor();

      //header("Location:index.php?#Langues");
    }
    catch (PDOException $e) {
      die('Failed to insert Article : ' . $e->getMessage());
      $connection->rollBack();
    }
  

}
?>
</body>
</html>