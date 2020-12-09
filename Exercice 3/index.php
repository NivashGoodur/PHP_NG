<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    $admin = FALSE;


    if ($admin == true){
        echo('<p>Bonjour admin , voici le lien : <a href="#">LINK</a> </p>');
    }
    else{
        echo('<p style="color:red;"> <strong>  Cette page est réservée aux admins </strong> </p>');
    }



?>


</body>
</html>