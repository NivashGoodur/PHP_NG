<?php

    if (isset($_POST['age']) && isset($_POST['email']) && isset($_POST['site'])){

        if (filter_var($_POST['age'], FILTER_VALIDATE_INT) > 0 && filter_var($_POST['age'], FILTER_VALIDATE_INT) < 150){
            $correct[] = 'L\'age est correct';
        }else{
            $errors[] = 'Vérifiez l\'âge ';
        }


        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $correct[] = "L'adresse email est valide !";
        }else{
            $errors[] = "L'adresse email n'est pas valide !";
        }

        if(filter_var($_POST['site'], FILTER_VALIDATE_URL)){
            $correct[] = 'L\'URL est correct';
        }else{
            $errors[] = ' Mauvaise URL';
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
    <input type="text" name="age" placeholder="âge">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="site" placeholder="lien du site">
    <input type="submit">
    </form>

<?php
   if(isset($errors)){
        foreach($errors as $error){
        echo '<p style="color:red;">' . $error . '</p>';
        }
    }


    if(isset($correct)){
        foreach($correct as $corrects){
            echo '<p style="color:green;">' . $corrects . '</p>';
        }
    }

?>

</body>
</html>