
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercice API geo gouv</title>
    <style>
    body{
        text-align: center;
    }

    #view{
        border: 2px solid black;
        min-height: 300px;
        width: 50%;
        margin:auto;
        margin-top: 30px;
        padding: 1rem;
    }

    .red{
        color:red;
    }

    .green{
        color:green;
    }

    .overlay{

        background-color : rgba(0,0,0,0.6);
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        display:flex;
        align-items: center;
        justify-content: center;
    }

    table{
        width:100%;
    }

    table tr td, table tr th{
        padding:1rem;
    }
    </style>
</head>
<body>

    <h1>Récupérer les infos d'une ville à partir de l'api :<br><a href="https://api.gouv.fr/api/api-geo.html">https://api.gouv.fr/api/api-geo.html</a></h1>
    <p style="font-size: 2rem;">URL de base :<br>https://geo.api.gouv.fr/communes/?nom=VILLE</p>

    <form action="https://geo.api.gouv.fr/communes/" method="GET">
        <input placeholder="Ville recherchée" type="text" name="nom" class="nom">
        <input type="submit">
    </form>

    <!-- Div qui affichera les messages d'erreurs et les résultats de la recherche par ville -->
    <div id="view"></div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>