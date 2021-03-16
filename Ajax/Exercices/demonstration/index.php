<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <button>Récupéréer coordonnées </button>





<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

    $('button').click(function(){
        //Options de la demande de localisation GPS
        let options = {
            enableHighAccuracy: true,    //Activation de la localisation haute précision si elle est disponible
            timeout: 5000,      //Si le navigateur met plus que ce temps en ms à trouver les coordonnées GPS, on considère que c'est échoué et la fonction error sera appelée
            maximumAge: 0   //0 évite la mise en cache des coordonnées GPS
        };

        //Fonction qui sera executée si la demande GPS a échoué ou est refusée ("e" contient le code de l'erreur)
        let error = function(e){
            if(e.code == e.TIMEOUT){
                alert('Temps expiré');
            }else if(e.code == e.PERMISSION_DENIED){
                alert('Géolocalisation refusée !');
            }else if(e.code == e.POSITION_UNAVAILABLE){
                alert('Localisation impossible');
            }else{
                alert('Probème inconnu !');
            }
        };

        //Fonction qui sera executée si la demande de localisation GPS a réussi (p contient  les données GPS)
        let success = function(p){

            $('body').append('<p>Coordonnées GPS actuelles : <br>Latitude: '+p.coords.latitude+'<br>Longitude: '+ p.coords.longitude +'');
        };


        //Demande au navigateur les coordonnées GPS (success : fonction appelée si c'est bon, error: fonction appelée si echec, options : paramètres)
        navigator.geolocation.getCurrentPosition(success, error, options);
    });

</script>
</body>
</html>