<?php
    ////////////////////////////////////////////////////////////////////////////
    //
    //  Méthodes fournies
    //  Script : getNextNumAngl.php
    //
    ////////////////////////////////////////////////////////////////////////////
    //
    ////////////////////////////////////////////////////////////////////////////
    // Reconstituer le prochain numéro d'angle à partir d'une fonction PHP 
    ////////////////////////////////////////////////////////////////////////////

    // Fonction pour recupérer la prochaine PK de la table ANGLE
    function getNextNumAngl($NumLang) {

      // Connexion à la BDD 
      include 'db.php';

      // Découpage FK LANGUE 
      $LibLangSelect = substr($NumLang, 0, 4); 
      $parmNumLang = $LibLangSelect . '%';

      $requete = "SELECT MAX(NumLang) AS NumLang FROM ANGLE WHERE NumLang LIKE '$parmNumLang';";
      $result = $connection->query($requete);

      if ($result) {
          $tuple = $result->fetch();
          $NumLang = $tuple["NumLang"];
          if (is_null($NumLang)) {    // New lang dans ANGLE
              $numSeq2Angl = 0;  
          }
          // No séquence suivant LANGUE
          $numSeq2Angl++;
          // No séquence ANGLE
          $numSeq1Angl = 0;

          // No séquence ANGLE : Récup dernière PK utilisée
          $requete = "SELECT MAX(NumAngl) AS NumAngl FROM ANGLE;";

          $result = $connection->query($requete);
          $tuple = $result->fetch();
          $NumAngl = $tuple["NumAngl"];

          $NumAnglSelect = (int)substr($NumAngl, 4, 2);
          $numSeq1Angl = $NumAnglSelect + 1;

          $LibAnglSelect = "ANGL";
          // PK reconstituée : ANGL + no seq angle
          if ($numSeq1Angl < 10) {
              $NumAngl = $LibAnglSelect . "0" . $numSeq1Angl;
          }
          else {
              $NumAngl = $LibAnglSelect . $numSeq1Angl;
          }
          // PK reconstituée : ANGL + no seq angle + no seq langue
          if ($numSeq2Angl < 10) {
              $NumAngl = $NumAngl . "0" . $numSeq2Angl;
          }
          else {
              $NumAngl = $NumAngl . $numSeq2Angl;
          }
      }   // End of if ($result) / no seq angle
      return $NumAngl;
    }
?>
