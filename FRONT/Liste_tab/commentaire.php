<!DOCTYPE html>
<html>
<head>
    <title>liste des commentaires</title>
    <link rel="stylesheet" href="stylecommentaire.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php require '../Require_php/barnav_dashbord.php'; ?><!--navbar-->
    <div class="container">
    
        <div class="tableau_global">
        <h3 class="creat_php">Liste des commentaires</h3>
        <p class="texte1">Répertoire de tous les commentaires</p>
        <div class="table-responsive-lg">
            <table class="tableau_langues">
                <thead>
                    <tr class="en-tete">
                        <th>numéro commentaire</th>
                        <th>date de création</th>
                        <th>pseudo auteur</th>
                        <th>email auteur</th>
                        <th>titre commentaire</th>
                        <th>libellé commentaire long</th>
                        <th>numéro article</th>
                        <th>action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="ligne_1">
                        <td>001</td>
                        <td>2020-01-09 10:13:43</td>
                        <td>Phil09</td>
                        <td>Phil09@me.com</td>
                        <td>Trop cool comme article</td>
                        <td>Trop cool comme article</td>
                        <td>10</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                    <tr class="ligne_2">
                        <td>002</td>
                        <td>2020-01-02 13:18:42</td>
                        <td>TomyBl</td>
                        <td>TomyBl@me.com</td>
                        <td>Trop cool comme article</td>
                        <td>Trop cool comme article</td>
                        <td>10</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                    <tr class="ligne_3">
                        <td>003</td>
                        <td>2020-01-04 16:21:12</td>
                        <td>Chouchou</td>
                        <td>Chouchou@me.com</td>
                        <td>Trop cool comme article</td>
                        <td>Trop cool comme article</td>
                        <td>10</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                    <tr class="ligne_4">
                        <td>004</td>
                        <td>2020-01-05 03:15:38</td>
                        <td>Titi</td>
                        <td>Titi@me.com</td>
                        <td>Trop cool comme article</td>
                        <td>Trop cool comme article</td>
                        <td>10</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                </tbody>
             </table>
            </div>
          </div>  
     </div>
</body>
</html>