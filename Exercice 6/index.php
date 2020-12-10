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

    $firstname = ['Emma','Jade','Louise','Gabriel','Léo','Raphaël ',' Lina', 'Louna','Enzo','Anna '];

    for($i = 0; $i<10; $i++){
        echo '<li>'.$firstname[$i].'</li>';
    }
    ?>

</ul>
</body>
</html>


