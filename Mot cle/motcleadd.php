<?php
    ////////////////////////////////////////////////////////////////////////////
    //
    //  Méthodes fournies
    //  Script : getNextNumMoCle.php
    //
    ////////////////////////////////////////////////////////////////////////////
    //
    ////////////////////////////////////////////////////////////////////////////
    // Reconstituer le prochain numéro de mot clé à partir d'une fonction PHP 
    ////////////////////////////////////////////////////////////////////////////

    // Fonction pour recupérer la prochaine PK de la table MOTCLE
    function getNextNumMoCle($NumLang) {

      // Connexion à la BDD 
      include 'db.php';

      // Découpage FK LANGUE 
      $LibLangSelect = substr($NumLang, 0, 4); 
      $parmNumLang = $LibLangSelect . '%';

      $requete = "SELECT MAX(NumLang) AS NumLang FROM MOTCLE WHERE NumLang LIKE '$parmNumLang';";
      $result = $connection->query($requete);

      if ($result) {
          $tuple = $result->fetch();
          $NumLang = $tuple["NumLang"];
          if (is_null($NumLang)) {    // New lang dans MOTCLE
              // Récup dernière PK utilisée
              $requete = "SELECT MAX(NumMoCle) AS NumMoCle FROM MOTCLE;";
              $result = $connection->query($requete);
              $tuple = $result->fetch();
              $NumMoCle = $tuple["NumMoCle"];

              $NumMoCleSelect = (int)substr($NumMoCle, 4, 2);
              // No séquence suivant LANGUE
              $numSeq1MoCle = $NumMoCleSelect + 1;
              // Init no séquence MOTCLE pour nouvelle lang
              $numSeq2MoCle = 1;
          }
          else {
              // Récup dernière PK pour FK sélectionnée
              $requete = "SELECT MAX(NumMoCle) AS NumMoCle FROM MOTCLE WHERE NumLang LIKE '$parmNumLang' ;";
              $result = $connection->query($requete);
              $tuple = $result->fetch();
              $NumMoCle = $tuple["NumMoCle"];

              // No séquence actuel LANGUE
              $numSeq1MoCle = (int)substr($NumMoCle, 4, 2);
              // No séquence actuel MOTCLE
              $numSeq2MoCle = (int)substr($NumMoCle, 6, 2); 
              // No séquence suivant MOTCLE
              $numSeq2MoCle++;
          }

          $LibMoCleSelect = "MTCL";
          // PK reconstituée : MTCL + no seq langue
          if ($numSeq1MoCle < 10) {
              $NumMoCle = $LibMoCleSelect . "0" . $numSeq1MoCle;
          }
          else {
              $NumMoCle = $LibMoCleSelect . $numSeq1MoCle;
          }
          // PK reconstituée : MOCL + no seq langue + no seq mot clé
          if ($numSeq2MoCle < 10) {
              $NumMoCle = $NumMoCle . "0" . $numSeq2MoCle;
          }
          else {
              $NumMoCle = $NumMoCle . $numSeq2MoCle;
          }
      }   // End of if ($result) / no seq LANGUE
      return $NumMoCle;
    }
?>
