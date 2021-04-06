<?php
    //Appel des variables
    if(
        isset($_POST['email']) &&
        isset($_FILES['photo'])
    ){

            $fileErrorCode= $_FILES['photo']['error'];


            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $errors[] = 'Vérifiez l\'email !';
            }



            if($fileErrorCode == 1 || $fileErrorCode == 2 || $_FILES['photo']['size'] > 2000000){
                $errors[] = 'Fichier trop grand';
            }else if($fileErrorCode == 3){
                $errors[] ='Fichier non reçu en totalité, veuillez ré-essayer plus tard';
            }else if($fileErrorCode == 4){
                $errors[] ='Veuillez choisir une autre image';
            }else if($fileErrorCode == 6 || $fileErrorCode == 7 || $fileErrorCode == 8){
                $errors[] ='Porblème serveur , veuillez ré-essayer plus tard';
            }else if($fileErrorCode !=0){
                $errors[] ='Problème veuillez ré-essayer';
            }


            if(!isset($errors)){

                $allowedMIMEType = [
                    'image/jpeg',
                    'image/png',
                    'image/gif',
                ];

                $photoMIMEType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['photo']['tmp_name']);

                if(!in_array($photoMIMEType, $allowedMIMEType)){
                    $errors[] ='L\'image doit être un jpg, png ou gif !';
                }
                $newPhotoExt = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['photo']['tmp_name']);
                if(!isset($errors)){

                    if($newPhotoExt == 'image/jpeg'){
                        $newPhotoExt = 'jpg';
                    }else if($photoMIMEType == 'image/png'){
                        $newPhotoExt = 'png';
                    }else if($photoMIMEType == 'image/gif'){
                        $newPhotoExt = 'gif';
                    }

                    do{
                        $newPhotoName = md5(time(). rand()).'.'.$newPhotoExt;
                    }while(file_exists('images/' . $newPhotoName));


                    move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$newPhotoName);

                    $successMsg = 'Vos informations ont été envoyés';
                }

            }

    }


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 23</title>
</head>
<body>

    <form action="index.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
        <input type="file" name="photo" accept="image/jpeg, image/png">
        <input type="text" name="email" placeholder="email">
        <input type="submit">
    </form>

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
        }

    ?>
</body>
</html>