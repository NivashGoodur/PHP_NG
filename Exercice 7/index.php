<?php $usersInfos = [
    'firstname' => 'Enzo',
    'lastname'=> 'Alex',
    'adress' => 'France',
    'email' => 'test@gmail.com',
    'age' => '20']; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    span{
        color:red;
        font-weight: bold;
    }
    </style>
</head>
<body>

    <?php
    echo('Son prénom est <span>'.$usersInfos['firstname'].'</span>
    ,nom: <span>'.$usersInfos['lastname'].'</span>
    ,adresse : <span>'.$usersInfos['adress'].'</span>
    ,email: <span>'.$usersInfos['email']. '</span>
    et son âge :<span>' .$usersInfos['age'].'</span>');


    ?>

</body>
</html>


