<?php
    //Création d'un array contenant des utilisateurs avec leurs infos (les pays sont eux-mêmes un sous-tableau)
    $users = [

        [
            'firstname' => 'name1',
            'name' => 'firstname1',
            'info' => 'info1',
            'visitedCountry' => [],   //Pas de pays visité donc array vide
        ],
        [
            'firstname' => 'name2',
            'name' => 'firstname2',
            'info' => 'info2',
            'visitedCountry' => ['Spain','France','ok2'],
        ],
        [
            'firstname' => 'name3',
            'name' => 'firstname3',
            'info' => 'info3',
            'visitedCountry' => ['United States'],
        ],
        [
            'firstname' => 'name4',
            'name' => 'firstname4',
            'info' => 'info4',
            'visitedCountry' => ['Italy','United States'],
        ],
        [
            'firstname' => 'name5',
            'name' => 'firstname5',
            'info' => 'info5',
            'visitedCountry' => ['Germany','Italy'],
        ],
    ];

?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    //On parcours tous les utilisateurs avec un foreach pour afficher une structure HTML pour chacu d'entre eux
        foreach($users as $userInfos){

            //Titre h2 avec le nom de l'utilisateur actuellement extrait par le foreach dans $userInfos
            echo '<h2>'.$userInfos['name']. '</h2>';
            echo '<p>Je suis'.$userInfos['firstname'].'et j\'ai'.$userInfos['info'].'</p>';
            echo '<p> Liste des pays visités : </p>';

            //Si l'utilisateur a visité au moins un pays (il faut que le tableau des pays soit d'une taille minimum de 1), alors
            //On affichera ces pays, sinon on ira dans le else pour afficher un message d'erreur
            if(count($userInfos['visitedCountry'])> 0){

                //Ouverture de la liste à puce
                echo '<ul>';

                //On parcourt les pays pour les afficher un par un dans un li
            foreach($userInfos['visitedCountry'] as $country){
                echo '<li>'.$country.'</li>';
            }
            //Fermeture de la liste à puce
            echo '</ul>';

            }else{
                echo'<p style=color:red> Cet utilisateur n\'a pas encore visité de pays !</p>';
            }
            // Trait de séparation entre les utilisateurs
            echo '<hr>';
        }


    ?>

</body>
</html>


