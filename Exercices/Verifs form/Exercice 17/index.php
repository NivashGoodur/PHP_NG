<?php

    if(
        isset($_POST['email']) &&
        isset($_POST['pseudonyme']) &&
        isset($_POST['password']) &&
        isset($_POST['birthdate'])){


        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Vérifiez l\'email ';
        }

        if (!preg_match('/^[a-zA-Z0-9À-ÖØ-öø-ÿ\']{2,25}/', $_POST['pseudonyme'])){
            $errors[] = 'Le pseudonyme doit contenir au moins 2 caractères ';
        }

        if (!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#\$%&\'()*+,\-.\/:;<=>?@[\\\\\]\^_`{\|}~]).{8,4096}$/', $_POST['password'])){
            $errors[] = 'Le mot de passe doit contenir au moins 8 caractères';
        }

        if (!preg_match('/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/'
        , $_POST['birthdate'])){
            $errors[] = 'Vérifiez la date de naissance';
        }

        //Si pas d'erreurs
        if(!isset($errors)){
            $successMsg = 'Votre compte a bien été créé ! ';
        }

    }

?>







<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 17</title>
</head>
<body style="background-color:grey">


    <?php
        if(isset($errors)){
            foreach($errors as $error){
                echo '<p style="color:red;">' . $error . '</p>';
            }
        }

        if(isset($successMsg)){

            echo '<p style="color:green;">' . $successMsg . '</p>';
        }else{
            echo'<form action="index.php" method="POST">
            <input type="text" name="email" placeholder="EMAIL">
            <input type="text" name="pseudonyme" placeholder="PSEUDO">
            <input type="text" name="password" placeholder="MOT DE PASSE">
            <input type="text" name="birthdate" placeholder="DATE DE NAISSANCE">
            <input type="submit">
            </form>';
        }
    ?>
</body>
</html>