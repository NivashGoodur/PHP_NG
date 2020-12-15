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

            echo 'bonjour '.htmlspecialchars($_GET['name']).' ton adresse email est: '.htmlspecialchars($_GET['email']);
        }
        else{
            echo 'Veuillez passer par <a href="form.php">le formulaire</a> !';
        }
    ?>
</body>
</html>