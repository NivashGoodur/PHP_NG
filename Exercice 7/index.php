<?php
$usersInfos = [
    'firstname' => 'Enzo',
    'lastname'=> 'Alex',
    'adress' => 'France',
    'email' => 'test@gmail.com',
    'age' => '20'
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .red{
        color:red;
        font-weight: bold;
    }
    </style>
</head>
<body>

    <?php
    echo(
        'Son prénom est <span class="red">'.$usersInfos['firstname'].'</span>
        ,nom: <span class="red">'.$usersInfos['lastname'].'</span>
        ,adresse : <span class="red">'.$usersInfos['adress'].'</span>
        ,email: <span class="red">'.$usersInfos['email']. '</span>
        et son âge :<span class="red">' .$usersInfos['age'].'</span>')
    ;


    ?>

</body>
</html>


