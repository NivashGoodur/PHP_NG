<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Météo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1 class="center">Exercice Météo</h1>
    <h2 class="center">Lien pour récupérer les données météo d'une position via coordonnées GSP (longitude et latitude) : <br><a href="https://www.prevision-meteo.ch/services/json/lat=46.80lng=4.41">https://www.prevision-meteo.ch/services/json/lat=XXXlng=YYY</a><br>(remplacer XXX par la latitude et YYY par la longitude)</h2>
    <h2 class="center">PDF explicatif de l'API :<br><a href="https://www.prevision-meteo.ch/uploads/pdf/recuperation-donnees-meteo.pdf">https://www.prevision-meteo.ch/uploads/pdf/recuperation-donnees-meteo.pdf</a></h2>




    <div class="center">
        <button id="userPositionButton" style="font-size:1.4rem;">Voir la météo sur ma position</button>
    </div>



    <div id="infos"></div>




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>