<?php

//Exercice 1 :

//Fonction permettant d'afficher le contenu d'une variable avec un print_r entouré d'une balise html <pre>
function print_rv2 ($elementsToDisplay){
    echo '<pre>';
    print_r($elementsToDisplay);
    echo'</pre>';

}


$fruits = ['Pomme', 'Poire', 'Cerise', 'Kiwi'];
//$test = ['test1', 'test2', 'test3', 'test4'];


//Exercice 2 :

//Fonction qui retourne un prix initial additionné avec une taxe précisé en second paramètre (20% par défaut)
function getTTCPrice($htPrice, $tax = 20){
    return $htPrice *(($tax / 100)+1) ;
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //Affichage de l'array des fruits avec la nouvelle fonction
    print_rv2($fruits);

    //Affichage du prix TTC de 19€ avec (tva = 20 par défaut)
    echo getTTCPrice(19);
    ?>
</body>
</html>