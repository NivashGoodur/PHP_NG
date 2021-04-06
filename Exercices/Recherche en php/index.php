<?php

//Tentative de connexion à la base de données
try{
    $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');

    //A retirer une fois le site terminé
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(Exception $e){

    //Si la connexion à échouée, le die() stop la page et affiche un message
    die('Poblème avec la base de données :'.$e->getMessage());
}

//Si $_GET['color'] existe dans l'url, alors on cherchera tous les fruits de cette couleur, sinon on récupérera tous les fruits (dans le else)
if (isset($_GET['color'])){

    //Requête pour récupérer tous les fruits dont la couleur est celle présente dans l'URL(requête préparée car on a une variable PHP dans la requête)
    $response = $bdd->prepare("SELECT * FROM fruits WHERE color=?");
    $response->execute([$_GET['color']]);

    }else{

        //Requête pour récupérer tous les fruits (requete directe(query) car on a pas de variable PHP dans la requête)
        $response=$bdd->query('SELECT * FROM fruits');
    }


//Récupération des fruits sous forme d'array associatifs
$fruits = $response->fetchAll(PDO::FETCH_ASSOC);

//Fermeture requête
$response->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="GET">
    <input type="text" name="color" placeholder="Couleur du fruit">
    <input type="submit">
</form>

<?php
    if(!empty($fruits)){

        echo'<ul>';

        foreach($fruits as $fruit){
            echo '<li>'.htmlspecialchars($fruit['name']).' '.htmlspecialchars($fruit['color']).'</li>';
        }
        echo'</ul>';

    }else{
        echo'<p>Aucun fruit à afficher </p>';
    }

?>
</body>
</html>