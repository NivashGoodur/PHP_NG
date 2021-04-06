<?php
    //Connexion au fichier
    $myFile = fopen('compteur.txt', 'r+');

    //Récupération du nombre actuel de visite
    $compteur = fread($myFile, 12);

    //Augmentation de visite de 1
    $compteur++;

    //Replacement du curseur PHP au début(écrire par dessus l'ancien number)
    fseek($myFile, 0);

    //Écriture du nouveau nombre dans le fichier à la place de l'ancien
    fwrite($myFile, $compteur);

    //Fermeture connexion
    fclose($myFile);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 22</title>
</head>
<body>
    <?php
        echo'<p> La page a été vue '.$compteur.' fois </p>';
    ?>
</body>
</html>