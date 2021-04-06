<?php
    //Appel des variables
    if(
        isset($_POST['code_postal'])&&
        isset($_POST['price'])&&
        isset($_POST['surface'])&&
        isset($_POST['type'])&&
        isset($_POST['title'])&&
        isset($_POST['adress'])&&
        isset($_POST['city'])
    ){
        //Vérification du code postal avec 5 chiffres
        if(!preg_match('/\d{2}[ ]?\d{3}/' ,$_POST['code_postal'])){
            $errors[] = 'Veuillez vérifier le code postal';
        }

        //Vérification du prix avec que des nombres entiers
        if(!preg_match('/^[0-9]+$/' ,$_POST['price'])){
            $errors[] = 'Veuillez vérifier le prix';
        }

        //Vérification de la surface avec que des nombres entiers
        if(!preg_match('/^[0-9]+$/' ,$_POST['surface'])){
            $errors[] = 'Veuillez vérifier la surface';
        }

        //Vérification du type de logement
        if($_POST['type'] != 'location' && $_POST['type'] != 'vente' ){
            $errors[] = 'Veuillez vérifier le type';
        }

        //Vérification des champs titre adresse et ville
        if(empty($_POST['title']) || empty($_POST['adress']) || empty($_POST['city'])){
            $errors[] = 'Veuillez vérifier le titre l\'adresse et la ville';
        }

        $fileErrorCode= $_FILES['photo']['error'];

        //Vérification du fichier si l'on envoie un
        if ($fileErrorCode != 4){
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

            //Si il n'y a pas d'erreurs, vérification du type du fichier
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
                    //id du logement à rajouter
                    do{
                        $newPhotoName = 'logement_.'.$newPhotoExt;
                    }while(file_exists('images/' . $newPhotoName));


                    move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$newPhotoName);

                    $successMsg = 'Le fichier a été envoyé';
                }
            }
        }

        if(!isset($errors)){
            // Tentative de connexion à la base de données
            try{
            $bdd = new PDO('mysql:host=localhost;dbname=immobilier;charset=utf8', 'root', '');
            } catch(Exception $e){
            // Si la connexion à échouée, le die() stop la page et affiche un message
            die('Problème avec la base de données : ' . $e->getMessage());
            }

            //Création du logement
            $insertLogement = $bdd->prepare('INSERT INTO logements(titre, adresse, ville, code_postal, surface, prix, photo, type, description) VALUES(?,?,?,?,?,?,?,?,?)');

            $statut = $insertLogement->execute([
                $_POST['title'],
                $_POST['adress'],
                $_POST['city'],
                $_POST['code_postal'],
                $_POST['surface'],
                $_POST['price'],
                $_FILES['photo']['tmp_name'],
                $_POST['type'],
                $_POST['description'],
            ]);

            // Si ça a bien fonctionné ($statut contiendra true si c'est le cas, sinon false)
            if($statut){
                $successMsg = 'Votre compte a bien été créé !';
            } else {
                $errors[] = 'Problème avec le site, veuillez ré-essayer plus tard !';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immobilier</title>
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
            echo'<form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
            <input type="file" name="photo" accept="image/jpeg, image/png">
            <input type="text" placeholder="titre" name="title">
            <input type="text" placeholder="adresse" name="adress">
            <input type="text" placeholder="ville" name="city">
            <input type="text" placeholder="Description" name="description">
            <input type="text" placeholder="Code Postal" name="code_postal">
            <input type="number" placeholder="Prix" name="price">
            <input type="number" placeholder="Surface" name="surface">
            <label for="type">Choisir le type</label>
            <select name="type">
                <option value="location" name="location">Location</option>
                <option value="vente" name="vente">Vente</option>
            </select>
            <input type="submit">
        </form>';
        }

    ?>

<p>Voir les logements disponibles <a href="informations.php">ici</a></p>
</body>
</html>