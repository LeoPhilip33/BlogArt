<link href="../style_global.css" rel="stylesheet">
<script src="../script_global.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<div class="contfoot">
    <div class="part1foot">
        <div class="divapp">
            <p class="footertitre">À propos</p>
            <p class="footerapp">Six étudiants, dans une salle à Bordeaux (enfin plus vraiment), qui lisent des histoires toutes aussi terrifiantes les unes que les autres… Voici comment a été crée notre projet de blog sur les histoires terrifiantes de la belle-endormie. Si tu as déjà regardé l’intégrale de Saw ou si les threads de Squeezie n’ont aucun secret pour toi alors notre blog est fait pour toi. </p>
        </div>
        <div class="divnewslt">
            <div class="divnewsltcontent">
                <p class="footertitre">Newsletter</p>
                <p class="footerapp ">Abonne-toi à notre newsletter </p>
                <form class="formcontfooter" action="sendmail.php" method="POST">
                <input type="email" id="mailnews" name="mailnews" class="form-control" placeholder="Adresse mail" required>
                    <div class="rowformfooter">
                        <input type="checkbox" id="check" name="check" value="ok">
                        <p class="newscondi">Je vous autorise à utiliser cet email pour votre newsletter</p>
                    </div>
                    <div class="contentbtn">
                        <button type="submit" value="abonne"class="btnabo">S'abonner</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="divhdp">
            <div class="remonterehdiv " onclick='topFunction()'>
                <script>
                    function topFunction() {
                        document.body.scrollTop = 0; // For Safari
                        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                    }
                </script>
                <img class="remontereh" src="../images/goup.svg" alt="">
            </div>
        </div>
    </div>
    <div class="part2foot">
        <ul>
            <li class="men">
                <a href="../MentionsLegales/index.php">Mentions légales</a>
                <div class="s_men"></div>
            </li>
            <li class="nous">
                <a href="../Contact/index.php">Nous contacter</a>
                <div class="s_nous"></div>
            </li>
        </ul>
    </div>
</div>