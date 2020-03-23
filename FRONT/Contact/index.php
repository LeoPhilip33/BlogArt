<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
    <script src="../script_global.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Contact</title>
</head>
<body>
    <?php require '../Require_php/Illustration_header.php'; ?><!--header-->
    <?php require '../Require_php/barnav.php'; ?><!--navbar-->
    <!-- mennu -->
    <div class="content">
        <div class="fichecontact">
            <h3 class="titrecont">Contact</h3>
            <form class="formcont" action="sendmail.php" method="POST">
                <p class="phrasecont">Si la terreur ne te fais pas peur… Contacte-nous!</p>
                <div class="form-row">
                  <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" required>
                  </div>
                  <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" id="email" name="email" class="form-control" placeholder="Adresse Email" required>
                </div>
                <div class="form-group">
                  <label for="objet">Objet:</label>
                  <input type="text" id="objet" name="objet" class="form-control" placeholder="Objet" required>
                </div>
                <div class="form-group">
                  <label for="message">Message:</label>
                  <textarea class="form-control" id="message" name="message" rows="5" placeholder="..." required></textarea>
                </div>
                <div class="form-group">
                <button type="envoyer" value="ok"class="btn btn-primary">S’inscrire</button>
                </div>
              </form>
              <p class="phrasecont2">Si la terreur ne te fais pas peur… Contacte-nous!</p>
              <div class="icons">
                <img src="../images/twitter.svg" class="icon" alt="">
                <img src="../images/medium.svg" class="icon" alt="">
                <img src="../images/insta.svg" class="icon" alt="">
                <svg id="twittersvg" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.06 192.07"><defs><style>.cls-1{fill:#72857f;}.cls-2{fill:#fff;fill-rule:evenodd;}</style></defs><title>twitter</title><circle class="cls-1" cx="150" cy="147.81" r="96.03" transform="translate(-73.97 220.31) rotate(-80.75)"/><path class="cls-2" d="M132.49,176.26a22.63,22.63,0,0,1-21-15.67,22.57,22.57,0,0,0,9.68-.29c.08,0,.16-.08.32-.15a22.55,22.55,0,0,1-14.66-10.36,22,22,0,0,1-3.31-12,22.28,22.28,0,0,0,10,2.74,22.75,22.75,0,0,1-9.3-13.7,22.4,22.4,0,0,1,2.43-16.36c12.22,14.4,27.7,22.3,46.57,23.6-.14-.89-.27-1.68-.37-2.47a21.89,21.89,0,0,1,3.31-14.76,21.67,21.67,0,0,1,15.31-10.21,22,22,0,0,1,19.76,6.29,1.14,1.14,0,0,0,1.2.36,45.53,45.53,0,0,0,13.14-5,2.1,2.1,0,0,1,.3-.15s.05,0,.15,0a23.1,23.1,0,0,1-9.67,12.29A43.43,43.43,0,0,0,209,117a.41.41,0,0,1,.09.1c-.86,1.13-1.69,2.29-2.59,3.39a44.61,44.61,0,0,1-8.21,7.8.75.75,0,0,0-.37.71,63.31,63.31,0,0,1-.42,10,66.56,66.56,0,0,1-5.82,20.11,65.26,65.26,0,0,1-12.21,17.8,60.4,60.4,0,0,1-31,17.29,68.28,68.28,0,0,1-12.58,1.49A63.75,63.75,0,0,1,99.69,186l-.53-.34a45.66,45.66,0,0,0,22.59-3.11A44.91,44.91,0,0,0,132.49,176.26Z" transform="translate(-53.97 -51.78)"/></svg>
              </div>
        </div>
        <div class="barlat"></div>
    </div>
    <!-- footer -->
    <?php require '../Require_php/footer.php'; ?>
</body>
</html>