<?php
    $myFile = fopen('compteur.txt', 'r+');
    $compteur = fread($myFile, 5);

    $compteur++;

    fseek($myFile, 0);

    fwrite($myFile, $compteur);
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