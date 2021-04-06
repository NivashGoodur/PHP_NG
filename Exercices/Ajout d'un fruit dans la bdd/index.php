<?php
    //Appel des variables
    if(
        isset($_POST['name']) &&
        isset($_POST['color']) &&
        isset($_POST['origin']) &&
        isset($_POST['price'])){


        if (mb_strlen($_POST['name']) < 2 || mb_strlen($_POST['name']) > 25) {
            $errors[] = 'Le nom doit être entre 2 et 25 caractères';
        }

        if (mb_strlen($_POST['color']) < 2 || mb_strlen($_POST['color']) > 25){
            $errors[] = 'La couleur doit être entre 2 et 25 caractères';
        }

        if (mb_strlen($_POST['origin']) < 2 || mb_strlen($_POST['origin']) > 55){
            $errors[] = 'L\'origine doit être entre 2 et 55 caractères';
        }

        //Regex prix : composé de 1 à 4 chiffres, suivit optionnellement de 1 ou 2 chiffres derrière la virgule
        if (!preg_match('/^[0-9]{1,4}([\.,][0-9]{1,2})?$/',$_POST['price'])){
            $errors[] = 'Le prix : max 4 chiffres avant virgule et 2 chiffres après virgule';
        }

        //Si pas d'erreurs
        if(!isset($errors)){
            //Tentative de connexion à la base de données
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');

                //A retirer une fois le site terminé
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(Exception $e){

                //Si la connexion à échouée, le die() stop la page et affiche un message
                die('Poblème avec la base de données :'.$e->getMessage());
            }

            //requête préparée pour créer le nouveau fruit (requête préparée car il y a des variables PHP à mettre dedans, donc on se protège des injections SQL)
            $response = $bdd->prepare("INSERT INTO fruits (name, color, origin, price) VALUES (?, ?, ?, ?)");

            //Éxécution de la requête en liant le nouveau
            $response->execute([
            $_POST['name'],
            $_POST['color'],
            $_POST['origin'],
            str_replace(',','.', $_POST['price'])//converti "," en "." s'il y en a
            ]);

            //Si rowCount renvoi plus de 0 alors , l'item a été ajouté sinon erreur
            if($response->rowCount() > 0){
                $successMsg = 'Le nouveau fruit a été ajouté ! ';
            }else{
                $errors[] = 'Poblème interne au site veuillez réessayer plus-tard';
            }

            //Fermeture de la requête
            $response->closeCursor();

        }



    }

?>







<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 19</title>
</head>
<body>


    <?php
        //Affichage des erreurs
        if(isset($errors)){
            foreach($errors as $error){
                echo '<p style="color:red;">' . $error . '</p>';
            }
        }

        //Affichage du message de succès si il existe, sinon formulaire
        if(isset($successMsg)){

            echo '<p style="color:green;">' . $successMsg . '</p>';
        }else{
            ?>
            <form action="index.php" method="POST">
            <input type="text" name="name" placeholder="NAME">
            <input type="text" name="color" placeholder="COLOR">
            <input type="text" name="origin" placeholder="ORIGIN">
            <input type="text" name="price" placeholder="PRICE">
            <input type="submit">
            </form>
            <?php
        }
    ?>
</body>
</html>