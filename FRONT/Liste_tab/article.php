<!DOCTYPE html>
<html>
<head>
    <title>liste des articles</title>
    <link rel="stylesheet" href="stylearticle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php require '../Require_php/barnav_dashbord.php'; ?><!--navbar-->
    <div class="container">
    
        <div class="tableau_global">
        <h3 class="creat_php">Liste des articles</h3>
        <p class="texte1">Répertoire de tous les articles</p>
        <div class="table-responsive-lg">
            <table class="tableau_langues">
                <thead>
                    <tr class="en-tete">
                        <th>numéro article</th>
                        <th>date de création</th>
                        <th>Libellé titre A</th>
                        <th>Libellé chapô A</th>
                        <th>Libellé accroche A</th>
                        <th>Paragraphe 1A</th>
                        <th>Libellé sous-titre 1</th>
                        <th>Paragraphe 2A</th>
                        <th>Libellé sous-titre 2</th>
                        <th>libellé conclu A</th>
                        <th>URL photo</th>
                        <th>Likes</th>
                        <th>numéro angle</th>
                        <th>Numéro thématique</th>
                        <th>numéro langue</th>
                        <th>action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="ligne_1">
                        <td>09</td>
                        <td>2019-02-24</td>
                        <td>Lorem Ipsum : What is Lorem Ipsum?</td>
                        <td>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</td>
                        <td>There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..</td>
                        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
                        <td>Why do we use it?</td>
                        <td>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</td>
                        <td>Where does it come from?</td>
                        <td>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</td>
                        <td>Where can I get some?
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</td>
                        <td>https://monsiteamoi.com/image.png</td>
                        <td>5</td>
                        <td>ANGL0301</td>
                        <td>THE0102</td>
                        <td>FRAN01</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                    <tr class="ligne_2">
                        <td>09</td>
                        <td>2019-02-24</td>
                        <td>Lorem Ipsum : What is Lorem Ipsum?</td>
                        <td>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</td>
                        <td>There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..</td>
                        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
                        <td>Why do we use it?</td>
                        <td>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</td>
                        <td>Where does it come from?</td>
                        <td>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</td>
                        <td>Where can I get some?
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</td>
                        <td>https://monsiteamoi.com/image.png</td>
                        <td>5</td>
                        <td>ANGL0301</td>
                        <td>THE0102</td>
                        <td>FRAN01</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                    <tr class="ligne_3">
                        <td>09</td>
                        <td>2019-02-24</td>
                        <td>Lorem Ipsum : What is Lorem Ipsum?</td>
                        <td>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</td>
                        <td>There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..</td>
                        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
                        <td>Why do we use it?</td>
                        <td>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</td>
                        <td>Where does it come from?</td>
                        <td>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</td>
                        <td>Where can I get some?
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</td>
                        <td>https://monsiteamoi.com/image.png</td>
                        <td>5</td>
                        <td>ANGL0301</td>
                        <td>THE0102</td>
                        <td>FRAN01</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                    <tr class="ligne_4">
                        <td>09</td>
                        <td>2019-02-24</td>
                        <td>Lorem Ipsum : What is Lorem Ipsum?</td>
                        <td>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</td>
                        <td>There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..</td>
                        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
                        <td>Why do we use it?</td>
                        <td>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</td>
                        <td>Where does it come from?</td>
                        <td>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</td>
                        <td>Where can I get some?
                        <td>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</td>
                        <td>https://monsiteamoi.com/image.png</td>
                        <td>5</td>
                        <td>ANGL0301</td>
                        <td>THE0102</td>
                        <td>FRAN01</td>
                        <td><button class="edit">éditer</button> <button class="delete">supprimer</button></td>
                    </tr>
                </tbody>
             </table>
            </div>
          </div>  
     </div>
</body>
</html>