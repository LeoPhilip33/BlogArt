<?php
/*
*
* insertLangue(E).php
*
*/
    // Messages of errors = On
    ini_set('display_errors','on');
    ini_set('display_startup_errors','on');
    error_reporting(E_ALL);

    // 0. Controler saisies formulaire avant CRUD
    include './ctrlSaisies.php';

    // 1. Connexion à la BDD 
    include './pdo/Connect_PDO.php';

    // Gestion des erreurs de saisie
    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {      

      // Gestion de Submit
      $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        // CTRL de l'existence des champs du formulaire
        // Variables vides, Submit non vide et egal a "Valider"
        if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang']))
            AND ((isset($_POST['Lib2Lang'])) AND !empty($_POST['Lib2Lang']))
/***********************************************************************
    Ligne supprimée car listbox            
            AND ((isset($_POST['TypPays'])) AND !empty($_POST['TypPays']))
***********************************************************************/
            AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

            // Saisies valides
            $erreur = false;

            // 3. Chargement des variables du formulaire
            //  - Echappe les données fournies par le formulaire 
            $NumLang = 0;

            $Lib1Lang = (ctrlSaisies($_POST["Lib1Lang"]));
            $Lib2Lang = (ctrlSaisies($_POST["Lib2Lang"]));
            $numPays = (ctrlSaisies($_POST["TypPays"]));

            // Les 4 premiers caractères de la PK concernent le pays 
            // les 4 suivants représentent un numéro de séquence 
            // 4. Récupération dernière PK utilisée pour le pays concerné
            $numPaysSelect = $numPays;  // exemple : 'CHIN'
            $parmNumLang = $numPaysSelect . '%';
            $requete = "SELECT MAX(NumLang) AS NumLang FROM LANGUE WHERE NumLang LIKE '$parmNumLang';";

            // 5. Lancement de la requete
            $result = $bdPdo->query($requete);

            if ($result) {
                // Récupération du résultat de requête
                $tuple = $result->fetch();
                $NumLang = $tuple["NumLang"];
                if (is_null($NumLang)) {
                    $numSeqLang = 0;
                    $StrLang = $numPaysSelect;
                }
                else {
                    // Récupération de la dernière PK attribuée
                    $NumLang = $tuple["NumLang"];
                    $StrLang = substr($NumLang, 0, 4);
                    $numSeqLang = (int)substr($NumLang, 4);
                }

                // numéro séquence suivant
                $numSeqLang++;

                // PK reconstituée
                if ($numSeqLang < 10) {
                    $NumLang = $StrLang . "0" . $numSeqLang;
                }
                else {
                    $NumLang = $StrLang . $numSeqLang;
                }
            }   // End of if ($result)

            try {
                // Début transaction
                $bdPdo->beginTransaction();

                // 6. Preparation de la requete
                ////////////////////////////////////////////////////////
                //
                $query = $bdPdo->prepare('INSERT INTO LANGUE (NumLang, Lib1Lang, Lib2Lang, numPays) VALUES (:NumLang, :Lib1Lang, :Lib2Lang, :numPays);');

                // 7. Lancement de la requete
                ////////////////////////////////////////////////////////
                //
                $query->execute(
                  array(
                    ':NumLang' => $NumLang,
                    ':Lib1Lang' => $Lib1Lang,
                    ':Lib2Lang' => $Lib2Lang,
                    ':numPays' => $numPays
                  )
                );

                // 8. Récupération de l'id de l'article créé
                $langid = $NumLang;

                // 9. Commit de la transaction (confirme INSERT)
                $bdPdo->commit();

                // 10. Libération curseur
                $query->closeCursor(); 

                // 10. Libération curseur
                ////////////////////////////////////////////////////////
                //
                //$query->closeCursor(); 

                // 11. Redirige vers la page de liste des articles
                // après l'enregistrement 
                header("Location:index1.php?#Langues");
            }
            catch (PDOException $e) {

                // 6. Affichage msg d'erreur
                die('Failed to insert Langue : ' . $e->getMessage());

                // 9. RollBack de la transaction (annule INSERT)
                $bdPdo->rollBack();

            }

        }   // Fin du if ((isset($_POST['Lib1Lang'])) ...
        else {
            // Saisies invalides
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // Fin else
            
    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Initialisation des variables du formulaire
    // Table LANGUE
    include './initLangue.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <title>Blog'Art</title> 
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
  </head>
  <body>

    <section class="p-5 bg-light">
      <div class="conainer-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="text-center text-secondary">
              <h2>Ajoutez une Langue...</h2>
            </div>

    <!-- Début formualaire -->
    <form name="formulaire" method="post" action="insertLangue.php" class="text-muted">

        <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>" />

        <label for="Lib1Lang"><b>Libellé court :&nbsp;&nbsp;</b></label>
        <input type="text" name="Lib1Lang" id="Lib1Lang" size="25" maxlength="25" value="<?php if(isset($_GET['id'])) echo $_POST['Lib1Lang']; ?>" tabindex="10" placeholder="Sur 25 car." autofocus="autofocus" />

            <br><br>
        <label for="Lib2Lang"><b>Libellé long :&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
        <input type="text" name="Lib2Lang" id="Lib2Lang" size="45" maxlength="45" value="<?php if(isset($_GET['id'])) echo $_POST['Lib2Lang']; else echo $Lib2Lang; ?>" tabindex="20" placeholder="Sur 45 car." />

<!-- ---------------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------------- -->
    <!-- Listbox Pays -->
        <br><br>
        <label for="LibTypPays">
            <b>
                Quel pays :
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </b>
        </label>
        <input type="hidden" id="idTypPays" name="idTypPays" value="<?php echo $numPays; ?>" />            
        <select size="1" name="TypPays" id="TypPays"  class="form-control form-control-create" tabindex="30" >
<?php 
            $numPays = "";
            $frPays = "";  

            // 2. Preparation requete NON PREPAREE
            // Récupération de l'occurrence pays à partir de l'id
            $queryText = 'SELECT * FROM PAYS;';

            // 3. Lancement de la requete SQL
            $result = $bdPdo->query($queryText);

            // S'il y a bien un resultat
            if ($result) {
                // Parcours chaque ligne du resultat de requete
                // Récupération du résultat de requête
                    while ($tuple = $result->fetch()) {
                        $ListnumPays = $tuple["numPays"];
                        $ListfrPays = $tuple["frPays"];
?>
                        <option value="<?= $ListnumPays; ?>" >
                            <?php echo $ListfrPays; ?>
                        </option>
<?php 
                    } // End of while
            }   // if ($result)
?> 
        </select>
    <!-- FIN Listbox Pays -->
<!-- ---------------------------------------------------------------------- -->

        <?php
          // CTRL de l'existence des saisies
          if ($erreur) {
        ?>
              <br>
        <?php            
              echo ($errSaisies);
          }
          else {
        ?>
              <br>
        <?php
              $errSaisies = "";
              echo ($errSaisies);
          }                      
        ?>
            <br>
        <div class="control-group">
            <div class="controls">
                <input type="submit" name="Submit" value="Valider" class="btn btn-primary" />
            </div>
        </div>

    </form>
    <!-- Fin formualaire -->

          </div>
        </div>
      </div>
    </section>
  </body>
</html>
