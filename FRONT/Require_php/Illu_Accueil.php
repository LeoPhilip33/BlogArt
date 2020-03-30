<?php
if(!isset($_SESSION['user']['Login'])) {
    $utilisateur = " ";
}
else{
    $utilisateur = "De retour parmis nous " .$_SESSION['user']['Login'];
}
?>
<link href="../style_global.css" rel="stylesheet">
<div class="IlluHead1">
<h1 class="user"> <?= $utilisateur ?> </h1>
    <p class="txtimgheader">Découvrir</p>
    <div class="contentarrow">
        <a href="#h"><img class="downarrowheadac" src="../images/down-arrow.png" alt=""></a>
    </div>
</div>
<div id="h"></div>
