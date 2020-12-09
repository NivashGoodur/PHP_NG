<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $admin = FALSE; ?>
</head>
<body>
<h1>Exercice 3</h1>

<?php



    if ($admin == true){
        echo('<p>Bonjour admin , voici le lien : <a href="#">LINK</a> </p>');
    }
    else{
        echo('<p style="color:red;"> <strong>  Cette page est réservée aux admins </strong> </p>');
    }



?>


</body>
</html>