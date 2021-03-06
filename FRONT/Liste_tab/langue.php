<!DOCTYPE html>
<html>
<head>
    <title>liste des langues</title>
    <link rel="stylesheet" href="stylelangue.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php require '../Require_php/barnav_dashbord.php'; ?><!--navbar-->
    <div class="container">
    
        <div class="tableau_global">
        <h3 class="creat_php">Liste des langues</h3>
        <p class="texte1">Répertoire de toutes les langues</p>
        <div class="table-responsive-lg">
            <table class="tableau_langues">
                <thead>
                    <tr class="en-tete">
                        <th>Libellés courts</th>
                        <th>Libellés longs</th>
                        <th>Numéros pays</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="ligne_1">
                        <td>Allemand(e)</td>
                        <td>Langue allemande</td>
                        <td>ALLE</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                    <tr class="ligne_2">
                        <td>Anglais(e)</td>
                        <td>Langue anglaise</td>
                        <td>ANGL</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                    <tr class="ligne_3">
                        <td>Bulgare</td>
                        <td>Langue Bulgare</td>
                        <td>BULG</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                    <tr class="ligne_4">
                        <td>Espagnol(e)</td>
                        <td>Langue espagnole</td>
                        <td>ESPA</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                </tbody>
             </table>
            </div>
          </div>  
     </div>
</body>
</html>