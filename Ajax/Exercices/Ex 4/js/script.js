//Ecouteur d'évènements sur le formulaire
$('form').submit(function(e){

    //Empêche le formulaire de fonctioner (la requête AJAX prendra le relai à sa place)
    e.preventDefault();

    //Vide le nombre de résultats trouvés
    $('#view').html('');

    //stocke l'input
    let city = $('[name="nom"]').val();

    //raccourci vers le formulaire
    let form = $(this);

    //Si le champ a an moins 1 caractère, on fait la requête AJAX
    if(city.length > 0){
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            dataType: 'json',
            timeout: 3000,
            data: form.serialize(),
            error: function(){
                //Si on rentre ici, c'est qu'il y a eu un problème pour contacter le serveur
                $('#view').html('<p class="red">Problème de connexion au serveur, veuillez réessayer</p>');
            },
            success: function(data){

                let results;
                $(".green").html('');
                $(".red").html('');


                //message nombre résultats
                if(data.length > 0){

                let results = $("<p class=\"green\"></p>").text('Il y a : '+ data.length +' résultats');
                $("form").append(results);
                }else{
                    let results = $("<p class=\"red\"></p>").text('Il y a : '+ data.length +' résultat');
                $("form").append(results);
                $("#view").append("<p class=\"red\">Aucun résultat</p>");
                }


                    //Création en tête tableau
                    $('#view').append(` <table class="myTable">
                    <tr>
                        <th>Nom</th>
                        <th>Codes Postaux</th>
                        <th>Population</th>
                        <th>Département</th>
                    </tr>
                </table>
                <tbody></tbody>`);

                    //Création cellules
                    for (let i = 0; i < data.length; i++){


                        let row = `
                        <tr>
                            <td>${data[i].nom}</td>
                            <td>${data[i].code}</td>
                            <td>${data[i].population}</td>
                            <td>${data[i].codeDepartement}</td>
                        </tr>`

                        $('tbody').append(row);

                    }
            },
            beforeSend: function(){
                //Affiche l'overlay avant que la requête AJAX soit envoyée
                displayOverlay();
            },
            complete: function(){
                //Supprime l'overlay après que la requête AJAX soit revenue
                removeOverlay();
            }
        });
    }else{
        //message d'erreur si le champ est vide
        $('#view').html('<p class="red">Veuillez remplir le champ !</p>');
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