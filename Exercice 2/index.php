<?php
$first_name = 'Nivash';
$color = 'red';
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{
        background-color : <?php echo $color; ?>;
        }
    </style>
</head>
<body>

<h1>Bonjour <?php echo $first_name; ?> !</h1>

</body>
</html>