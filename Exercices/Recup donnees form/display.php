<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    <?php
    if(isset($_GET['name']) &&  isset($_GET['email'])){

            echo 'bonjour <b>'.htmlspecialchars($_GET['name']).'</b> ton adresse email est: <b>'.htmlspecialchars($_GET['email']).'</b>';
        }
        else{
            echo 'Veuillez passer par <a href="form.php">le formulaire</a> !';
        }
    ?>
</body>
</html>