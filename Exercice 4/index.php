<?php $i = 0; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
echo('<ul>');

if($i == 0){
    $i ++;
    while($i <5001){
        echo('<li>'.$i.'</li>');
        $i++;
        }
}
echo('</ul>');

?>


</body>
</html>