<?php
     // Tentative de connexion à la base de données
     try{
        $bdd = new PDO('mysql:host=localhost;dbname=immobilier;charset=utf8', 'root', '');
    } catch(Exception $e){
        // Si la connexion à échouée, le die() stop la page et affiche un message
        die('Problème avec la base de données : ' . $e->getMessage());
    }

    //Requête SQL au GBD
    $response = $bdd->query('SELECT * FROM logements');

    // Récupération de tous les logements sous forme d'arrays PHP associatifs
    $logements = $response->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logements</title>
</head>
<body>
    <h1>Liste des logements disponibles</h1>

    <!--Création du tableau -->
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Code Postal</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Photo</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody>
            <?php //Boucle permettant de parcourir tous les logements
                foreach($logements as $logement){
            ?>
            <tr>
                <td><?php echo ucfirst(htmlspecialchars($logement['titre'])); ?></td>
                <td><?php echo ucfirst(htmlspecialchars($logement['adresse'])); ?></td>
                <td><?php echo ucfirst(htmlspecialchars($logement['ville'])); ?></td>
                <td><?php echo htmlspecialchars($logement['code_postal']);?></td>
                <td><?php echo htmlspecialchars($logement['surface']);?> m²</td>
                <td><?php echo htmlspecialchars($logement['prix']);?>€</td>
                <td></td>
                <td><?php echo ucfirst(htmlspecialchars($logement['type'])); ?></td>
                <td><?php echo htmlspecialchars($logement['description']); ?></td>
            </tr>
            <?php } ?>
        </tbody>
   </table>

   <p>Créer un nouveau logement <a href="index.php">ici</a></p>
</body>
</html>