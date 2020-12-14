<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    <?php
    if(isset($_GET['name']) == true AND isset($_GET['email']) == true){

            echo 'bonjour '.$_GET['name'].' ton adresse email est: '.$_GET['email'];
        }
        else{
            echo 'Veuillez passer par le formulaire';
        }
    ?>
</body>
</html>