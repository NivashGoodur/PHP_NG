<?php
    //Appel des variables
    if(
        isset($_POST['email']) &&
        isset($_POST['password']) &&
        isset($_POST['confirm_password'])){


        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Vérifiez l\'email !';
        }

        if (!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#\$%&\'()*+,\-.\/:;<=>?@[\\\\\]\^_`{\|}~]).{8,4096}$/', $_POST['password'])){
            $errors[] = 'Vérifier le mot de passe !';
        }

        if ($_POST['password'] != $_POST['confirm_password']){
            $errors[] = 'Les mots de passe ne correspondent pas !';
        }

        //Si pas d'erreurs
        if(!isset($errors)){

            //Second bloc de vérifs(si email pas déjà pris)


            //Tentative de connexion à la base de données
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');

                //A retirer une fois le site terminé
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(Exception $e){

                //Si la connexion à échouée, le die() stop la page et affiche un message
                die('Poblème avec la base de données :'.$e->getMessage());
            }

            $checkIfExists = $bdd->prepare('SELECT * FROM accounts WHERE email = ?');

            $checkIfExists->execute([
                $_POST['email']
            ]);

            //Si account n'est pas vide, ça veux dire un compte a été trouvé donc mssg erreur
            $account = $checkIfExists->fetch(PDO::FETCH_ASSOC);

            if(!empty($account)){
                $errors[] = 'Cette email est déjà prise , veuillez en mettre une autre !';
            }

            //Si pas d'erreurs
            if(!isset($errors)){

                //requête
                $response = $bdd->prepare("INSERT INTO accounts (email, password) VALUES (? , ?)");

                //Éxécution de la requête en liant le nouveau
                $response->execute([
                    $_POST['email'],
                    password_hash($_POST['password'], PASSWORD_BCRYPT)
                ]);

                //Fermeture de la requête
                $response->closeCursor();

                //Si rowCount renvoi plus de 0 alors , l'item a été ajouté sinon erreur
                if($response->rowCount() > 0){
                    $successMsg = 'L\'utilisateur a été ajouté !';
                }else{
                    $errors[] = 'Poblème interne au site veuillez réessayer plus-tard';
                }

            }
        }



    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <form action="register.php" method="POST">
                <input type="text" name="email" placeholder="EMAIL">
                <input type="text" name="password" placeholder="PASSWORD">
                <input type="text" name="confirm_password" placeholder="CONFIRM PASSWORD">
                <input type="submit">
                </form>
            <?php
        }
    ?>
</body>
</html>

