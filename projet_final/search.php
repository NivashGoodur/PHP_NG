<?php

// Inclusion du fichier des fonctions
require 'core/functions.php';

// Appel de la variable
if(
    isset($_GET['q'])
){

    // Bloc de verif
    if(mb_strlen($_GET['q']) < 1 || mb_strlen($_GET['q']) > 50){
        $error = 'Cette recherche est trop petite ou trop grande';
    }

    // Si pas d'erreurs
    if(!isset($error)){

        // Connexion à la bdd
        $bdd = connectDb();

        // Requête avec une jointure pour récupérer les infos des fruits dont le nom contient la recherche ainsi que le nom de leur créateur.
        // L'alias "as" permet de donner un nom différent au champ du nom du créateur qui sera "user_pseudonym" au lieu de "pseudonym" dans l'array PHP
        $getFruits = $bdd->prepare('SELECT fruits.id, fruits.name, fruits.origin, users.pseudonym as user_pseudonym FROM fruits INNER JOIN users ON fruits.user_id = users.id WHERE fruits.name LIKE ?');

        $getFruits->execute([
            '%' . $_GET['q'] . '%'
        ]);

        // Récupération de tous les fruits sous forme d'arrays PHP associatifs
        $fruits = $getFruits->fetchAll(PDO::FETCH_ASSOC);

    }

} else {
    // Si $_GET['q'] n'existe pas, alors la recherche est vide
    $error = 'URL Invalide !';
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des fruits - Wikifruit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <?php include 'core/partials/topmenu.php'; ?>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 col-md-8 offset-md-2 py-5">
                <h1 class="pb-4 text-center">Liste des Fruits</h1>

                <?php

                    // Si il y a une erreur, on l'affiche, sinon on affiche la suite
                    if(isset($error)){
                        echo '<p class="alert alert-danger text-center">' . $error . '</p>';
                    } else {

                        // Si le tableau des fruits est vide, la recherche n'a rien donné, sinon on affiche un tableau HTML avec les fruits
                        if(empty($fruits)){
                            echo '<p class="alert alert-warning text-center">Aucun fruit ne correspond à cette recherche!</p>';
                        } else {
                            ?>
                            <table class="table table-hover col-12 mt-4">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Pays d'origine</th>
                                        <th>Ajouté par</th>
                                        <th>Fiche</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    // Pour chaque fruit, on crée une nouvelle ligne dans le tableau HTML.
                                    // Le nom du fruit et du pays sont affichés avec la première lettre en majuscule avec ucfirst()
                                    // Le nom du pays est retrouvé dans le tableau des pays grâce à la clé stocké en bdd
                                    foreach($fruits as $fruit){
                                        ?>

                                        <tr>
                                            <td><?php echo ucfirst(htmlspecialchars($fruit['name'])); ?></td>
                                            <td><?php echo ucfirst($fruitCountries[$fruit['origin']]); ?></td>
                                            <td><?php echo htmlspecialchars($fruit['user_pseudonym']); ?></td>
                                            <td><a href="fruitdetails.php?id=<?php echo htmlspecialchars($fruit['id']); ?>">Voir la fiche</a></td>
                                        </tr>

                                        <?php
                                    }

                                    ?>
                                </tbody>
                            </table>
                            <?php
                        }
                    }
                ?>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>