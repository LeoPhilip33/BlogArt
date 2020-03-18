<?php
    ////////////////////////////////////////////////////////////////////////////
    //
    //  Méthodes fournies
    //  Script : getNextNumThem.php
    //
    ////////////////////////////////////////////////////////////////////////////
    //
    ////////////////////////////////////////////////////////////////////////////
    // Reconstituer le prochain numéro de la thématique à partir d'une fonction PHP 
    ////////////////////////////////////////////////////////////////////////////

    // Fonction pour recupérer la prochaine PK de la table THEMATIQUE
    function getNextNumThem($NumLang) {

      // Connexion à la BDD 
      include 'db.php';

      // Découpage FK LANGUE 
      $LibLangSelect = substr($NumLang, 0, 4); 
      $parmNumLang = $LibLangSelect . '%';

      $requete = "SELECT MAX(NumLang) AS NumLang FROM THEMATIQUE WHERE NumLang LIKE '$parmNumLang';";
      $result = $connection->query($requete);

      if ($result) {
          $tuple = $result->fetch();
          $NumLang = $tuple["NumLang"];
          if (is_null($NumLang)) {    // New lang dans THEMATIQUE
              // Récup dernière PK utilisée
              $requete = "SELECT MAX(NumThem) AS NumThem FROM THEMATIQUE;";
              $result = $connection->query($requete);
              $tuple = $result->fetch();
              $NumThem = $tuple["NumThem"];

              $NumThemSelect = (int)substr($NumThem, 3, 2);
              // No séquence suivant LANGUE
              $numSeq1Them = $NumThemSelect + 1;
              // Init no séquence THEMATIQUE pour nouvelle lang
              $numSeq2Them = 1;
          }
          else {
              // Récup dernière PK pour FK sélectionnée
              $requete = "SELECT MAX(NumThem) AS NumThem FROM THEMATIQUE WHERE NumLang LIKE '$parmNumLang' ;";
              $result = $connection->query($requete);
              $tuple = $result->fetch();
              $NumThem = $tuple["NumThem"];

              // No séquence actuel LANGUE
              $numSeq1Them = (int)substr($NumThem, 3, 2);
              // No séquence actuel THEMATIQUE
              $numSeq2Them = (int)substr($NumThem, 5, 2); 
              // No séquence suivant THEMATIQUE
              $numSeq2Them++;
          }

          $LibThemSelect = "THE";
          // PK reconstituée : THE + no seq langue
          if ($numSeq1Them < 10) {
              $NumThem = $LibThemSelect . "0" . $numSeq1Them;
          }
          else {
              $NumThem = $LibThemSelect . $numSeq1Them;
          }
          // PK reconstituée : THE + no seq langue + no seq thématique
          if ($numSeq2Them < 10) {
              $NumThem = $NumThem . "0" . $numSeq2Them;
          }
          else {
              $NumThem = $NumThem . $numSeq2Them;
          }
      }   // End of if ($result) / no seq LANGUE
      return $NumThem;
    }
?>
