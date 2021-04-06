<?php

    //Par défaut on assigne la couleur grise à $newColor pour éviter une couleur vide dans les cas ou il n'y a pas de formulaire ou autre.
    $newColor= 'grey';

    if(isset($_COOKIE['bg-color'])){
        $newColor = $_COOKIE['bg-color'];
    }

    //Méthode ternaire
    //$newColor = (isset($_COOKIE['bg-color'])) ? $_COOKIE['bg-color'] : 'red';

//Appel des variables
    if (isset($_POST['color'])){

        //Bloc des vérifs
        if(mb_strlen($_POST['color']) < 2 || mb_strlen($_POST['color']) > 10){
            $error="Vous devez remplir le champ de couleur !";
        }

        //Si pas d'erreur
        if(!isset($error)){

            //$newColor contiendra la couleur qui est envoyée par le formulaire
            $newColor = $_POST['color'];

            //On crée un nouveau cookie avec la nouvelle couleur
            setcookie('bg-color', $_POST['color'],time()+3600*24, null, null, false, true);
        }

    }
?>






<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 14</title>
</head>
<body style="background-color:<?php echo htmlspecialchars($newColor);?>;">
    <form action="index.php" method="POST">
        <input type="color" name="color" placeholder="nouvelle couleur">
        <input type="submit">
    </form>

    <?php
        //si le message d'erreur existe , on l'affiche
        if (isset($error)){
            echo '<p>'.$error.'<p>';
        }
    ?>
</body>
</html>