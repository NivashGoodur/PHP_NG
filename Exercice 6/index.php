<?php $names = ['Emma','Jade','Louise','Gabriel','Léo','Raphaël ',' Lina', 'Louna','Enzo','Anna '];?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



    <ul>
    <?php
//On récupère la taille de l'array avec count()
    $arrayLength = count($names);

//On boucle autant de fois qu'il y a d'éléments dans l'array
    for($i = 0; $i < $arrayLength; $i++){
        echo '<li>'.$names[$i].'</li>';
    }
    ?>

    </ul>
</body>
</html>


