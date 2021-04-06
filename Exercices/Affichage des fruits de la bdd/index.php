<?php
    if(isset($_GET['recherche'])){

        if(mb_strlen($_GET['recherche']) <1 || mb_strlen($_GET['recherche']) >50 ){
            $errors[]= 'Votre recherche doit être comprise entre 1 et 50 caractères';
        }


        if (!isset($errors)){
                //Tentative de connexion à la base de données
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');
            } catch(Exception $e){

                //Si la connexion à échouée, le die() stop la page et affiche un message
                die('Poblème avec la base de données :'.$e->getMessage());
            }

            //requête
            $searchFruits = $bdd->prepare("SELECT * FROM fruits WHERE name LIKE ?");

            //Éxécution de la requête en liant le nouveau
            $searchFruits->execute([
                '%'.$_GET['recherche'].'%'
            ]);

            $fruit = $searchFruits->fetchAll(PDO::FETCH_ASSOC);

        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 21</title>
    <style>
        table tr td, table tr th{
            border :1px solid black;
            padding:5px 10px;
        }
        table{
            border-collapse:collapse;
            margin-top:20px;
        }
    </style>
</head>
<body>
    <form action="index.php" method="GET">
    <input type="text" name="recherche" placeholder="Recherche...">
    <input type="submit">
    </form>

    <?php
    
    ?>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Couleur</th>
                <th>Origine</th>
                <th>prix</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($fruit as $fruits){
                echo'<tr>';
                echo'<td>'.htmlspecialchars(ucfirst($fruit['name'])).'</td>';
                echo'<td>'.htmlspecialchars($fruit['color']).'</td>';
                echo'<td>'.htmlspecialchars(ucfirst($fruit['origin'])).'</td>';
                echo'<td>'.htmlspecialchars($fruit['price']).'€</td>';
            }
        ?>
        </tbody>
    </table>
</body>
</html>