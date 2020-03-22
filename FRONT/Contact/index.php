<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Contact</title>
</head>
<body>
    <?php require '../Require_php/Illustration_header.php'; ?>
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
              </div>
        </div>
        <div class="barlat"></div>
    </div>
    <!-- footer -->
    
</body>
</html>