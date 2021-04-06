//quand le formulaire est envoyé
$('form').submit(function(e){

    //Empêche redirection du formulaire
    e.preventDefault();

    //Suppression de l'éventuel précédent message de résultat (Résultats : x)
    $('.result').remove();

    //Récupération du contenu du champ
    let nameValue = $('.nom').val();

    //Raccourcis vers le formulaire
    let form = $(this);

    //Si il y a au moins un caractère
    if(nameValue.length > 0){

        //Requête AJAX
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            dataType: 'json',
            timeout: 5000,
            data: form.serialize(),
            error: function(){

                $('#view').html('<p class="red">Echec de connexion ! </p>');
            },
            success: function(data){

                //Affichage du nombre de résultat en dessous du formulaire en fonction du nombre de résultat à afficher
                if(data.length ==0){
                    form.after('<p class="red result">Résultat :0</p>');
                }else if(data.length == 1){
                    form.after('<p class="green result">Résultat: 1</p>');
                }else{
                    form.after('<p class="green result">Résultats: ' +data.length+'</p>');
                }

                //Si il y a au moins 1 résultat
                if(data.length > 0){

                    //On insère un tableau HTML vide dans la div de vue
                    $('#view').html(`
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Code Postaux</th>
                                <th>Département</th>
                                <th>Population</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    `);

                    //Pour chaque ville dans data, on insère une nouvelle ligne dans le tableau HTML avec les infos de la ville

                    //Attention, normalement on échappe les données reçu de l'API pour éviter les failles XSS (avec .text ou .textContent)
                    data.forEach(function(city){

                        console.log(city);
                        $('#view table tbody').append(`
                        <tr>
                            <td>`+city.nom+`</td>
                            <td>`+city.codesPostaux.join('<br>')+`</td>
                            <td>`+city.codeDepartement+`</td>
                            <td>`+city.population.toLocaleString()+`</td>
                        </tr>
                        `);
                    });
                }else{

                    //Si on est là, c'est qu'il y a aucune ville correspondant à la recherche
                    $('#view').html('<p class="red">Aucun résultat</p>');
                }
            },
            beforeSend: function(){

                //Affichage de l'overlay avant l'envoi de la requête AJAX
                displayOverlay();
            },
            complete: function(){

                //Suppression de l'overlay après le retour de la requête AJAX
                removeOverlay();
            }
        });
    }else{

        $('#view').html('<p class="red">Champ vide ! </p> ');
    }
});

//Fonction permettant d'afficher un overlay avec une icone de chargement
function displayOverlay(){

    $('body').prepend(`
        <div class="overlay">
            <img src="images/ajaxloader.svg alt="">
        </div>
    `);
}

//Fonction permettant de supprimer l'overlay
function removeOverlay(){

    $('.overlay').remove();
}