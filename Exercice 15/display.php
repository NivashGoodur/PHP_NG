<?php 
    session_start();

    if (isset($_SESSION['firstname']) && isset($_SESSION['name'])){
        echo'Bonjour '.$_SESSION['firstname'].' '.$_SESSION['name'];
    }else{
        echo'Veuillez aller sur la page <a href="create.php">Create</a>';
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    <h1>Display</h1>

    <?php include 'menu.php'; ?>
</body>
</html>