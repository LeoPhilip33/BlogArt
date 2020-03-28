<!DOCTYPE html>
<html>
<head>
    <title>liste des angles</title>
    <link rel="stylesheet" href="styleangle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php require '../Require_php/barnav_dashbord.php'; ?><!--navbar-->
    <div class="container">
    
        <div class="tableau_global">
        <h3 class="creat_php">Liste des angles</h3>
        <p class="texte1">Répertoire de tous les angles</p>
        <div class="table-responsive-lg">
            <table class="tableau_langues">
                <thead>
                    <tr class="en-tete">
                        <th>Numéro angle</th>
                        <th>Libellés longs</th>
                        <th>Numéros langue</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="ligne_1">
                        <td>ANGL0101</td>
                        <td>Handicap</td>
                        <td>FRAN01</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                    <tr class="ligne_2">
                        <td>ANGL0102</td>
                        <td>Grandes figures littéraires</td>
                        <td>FRAN01</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                    <tr class="ligne_3">
                        <td>ANGL0103</td>
                        <td>Great literary figures</td>
                        <td>ANGL01</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                    <tr class="ligne_4">
                        <td>ANGL0201</td>
                        <td>Mittelalterliche Geschichte</td>
                        <td>ALLE01</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                </tbody>
             </table>
            </div>
          </div>  
     </div>
</body>
</html>