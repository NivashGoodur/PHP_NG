<?php

session_start();

    if (isset($_SESSION['firstname']) && isset($_SESSION['name'])){
        session_destroy();
        echo'La session a bien été supprimée';
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destroy</title>
</head>
<body>
    <h1>Destroy</h1>

    <?php include 'menu.php'; ?>
</body>
</html>