<?php
    //Récupération du nombre actuel de visites
    $compteur = file_get_contents('compteur.txt');

    //Augmentation du nombre de visite
    $compteur++;

    //Sauvegarde du nouveau nombre dans le fichier compteur.txt
    file_put_contents('compteur.txt', $compteur);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 22 Part2</title>
</head>
<body>

     <p>La page a été visitée <?php echo $compteur?> </p>

</body>
</html>