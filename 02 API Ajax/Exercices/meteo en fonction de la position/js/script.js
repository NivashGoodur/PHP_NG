
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

            //$('body').append('<p>Coordonnées GPS actuelles : <br>Latitude: '+p.coords.latitude+'<br>Longitude: '+ p.coords.longitude +'');

            let url = "https://www.prevision-meteo.ch/services/json/lat="+ p.coords.latitude +"lng="+ p.coords.longitude;

            $.getJSON(url, function(data){
                //console.log(data.current_condition.tmp);
                console.log(data);
                console.log(data.fcst_day_1.date);
                $('#infos').html('<h2 class="center">Météo actuelle sur votre position :</h2> ');
                $('#infos').append('<p class="center">'+ data.current_condition.condition + ' <img src="'+ data.current_condition.icon +'"></p> ');
                $('#infos').append('<p class="center">Levé du soleil : '+ data.city_info.sunrise +' / Couché du soleil : '+ data.city_info.sunset +'</p>');
                $('#infos').append('<p class="center">Température : '+ data.current_condition.tmp +' degrés</p>');
                $('#infos').append('<p class="center">Humidité : '+ data.current_condition.humidity +' %</p>');
                $('#infos').append('<p class="center">Vent : '+ data.current_condition.wnd_spd +' km/h direction : '+ data.current_condition.wnd_dir +'</p>');
                $('#infos').append('<p class="center">Pression barométrique : '+ data.current_condition.pressure +' hPa</p>');

                //Création tableau des jours
                $('#infos').after('<div id="jours"></div>');
                $('#jours').append(`
                <div class=day>
                <h3>`+ data.fcst_day_1.day_long +`(`+data.fcst_day_1.date+`)</h3>
                <p>`+ data.fcst_day_1.condition +` <img src="`+ data.fcst_day_1.icon
                +`"></p>
                <p>Température : De `+ data.fcst_day_1.tmin +` degrés à `+ data.fcst_day_1.tmax +` degrés </p>
                </div>

                <div class=day>
                <h3>`+ data.fcst_day_2.day_long +`(`+data.fcst_day_2.date+`)</h3>
                <p>`+ data.fcst_day_2.condition +` <img src="`+ data.fcst_day_2.icon
                +`"></p>
                <p>Température : De `+ data.fcst_day_2.tmin +` degrés à `+ data.fcst_day_2.tmax +` degrés </p>
                </div>

                <div class=day>
                <h3>`+ data.fcst_day_3.day_long +`(`+data.fcst_day_3.date+`)</h3>
                <p>`+ data.fcst_day_3.condition +` <img src="`+ data.fcst_day_3.icon
                +`"></p>
                <p>Température : De `+ data.fcst_day_3.tmin +` degrés à `+ data.fcst_day_3.tmax +` degrés </p>
                </div>

                <div class=day>
                <h3>`+ data.fcst_day_4.day_long +`(`+data.fcst_day_4.date+`)</h3>
                <p>`+ data.fcst_day_4.condition +` <img src="`+ data.fcst_day_4.icon
                +`"></p>
                <p>Température : De `+ data.fcst_day_4.tmin +` degrés à `+ data.fcst_day_4.tmax +` degrés </p>
                </div>
                `);
            });
        };


        //Demande au navigateur les coordonnées GPS (success : fonction appelée si c'est bon, error: fonction appelée si echec, options : paramètres)
        navigator.geolocation.getCurrentPosition(success, error, options);
    });