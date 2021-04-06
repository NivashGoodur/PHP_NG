<?php
    session_start();

    if (!isset($_SESSION['firstname']) && !isset($_SESSION['name'])){
        $_SESSION['firstname'] = 'Nivash';
        $_SESSION['name'] = 'Goodur';
        echo'Les variables ont bien été crées';
    }else{
        echo'Les variables existent déjà !';
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Create</h1>

    <?php include 'menu.php'; ?>
</body>
</html>