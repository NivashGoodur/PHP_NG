<?php
//Retarde la réponse de PHP de 2 secondes pour avoir le temps côté JS de voir l'overlay s'afficher en attendant le retour de la requête AJAX
sleep(2);

//Appel des variables
if(
    isset($_POST['email']) &&
    isset($_POST['password'])
){

    //Bloc des vérifs
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Email invalide';
    }

    if(!preg_match('/^.{8,100}$/' ,$_POST['password'])){
        $errors[] = 'Mot de passe invalide !';
    }

    //Si pas d'erreurs
    if(!isset($errors)){

        if($_POST['email'] != 'alice@gmail.com'){
            $errors[] = 'Ce compte n\'existe pas';
        }else{

            if($_POST['password'] != 'azertyuiop'){
                $errors[] = 'Le mot de passe est incorrect';
            }else{
                $success = true;
            }
        }
    }
}

if(isset($errors)){

    echo json_encode([
        'success' => false,
        'errors' => $errors
    ]);
}

if(isset($success)){

    echo json_encode([
        'success' => true
    ]);
}