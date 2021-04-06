//Ecouteur d'évènements sur le formulaire
$('form').submit(function(e){

    //Empêche le formulaire de fonctioner (la requête AJAX prendra le relai à sa place)
    e.preventDefault();

    //Effacement de la div de vue pour supprimer les messages d'erreurs d'une éventuelle validation précédente
    $('#view').html('');


    //récupération des valeurs de champs
    let emailValue = $('[name="email"]').val();
    let passwordValue = $('[name="password"]').val();

    //raccourci vers le formulaire
    let form = $(this);

    //Si les 2 champs ont au moins un caractère, on fait la requête AJAX
    if(emailValue.length > 0 && passwordValue.length > 0){

        //Requête AJAX (le type et l'url sont directement récupérés depuis les attributs method et action du formulaire)
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            dataType: 'json',
            timeout: 3000,
            data: form.serialize(),
            error: function(){
                //Si on rentre ici, c'est qu'il y a eu un problème pour contacter le serveur
                $('#view').html('<p class="error">Problème de connexion au serveur, veuillez réessayer</p>');
            },
            success: function(data){

                //Si dans data la variable success contient "true" , alors c'est que les identifiants étaient bons, sinon on affiche les erreurs
                if(data.success){

                    $('#view').html('<p class="success">Vous êtes bien connecté !</p>');

                    //Suppression du formulaire visuellement
                    form.remove();

                }else{
                    //On ajoute dans la div de vue toutes les erreurs contenues dans data.errors
                    data.errors.forEach(function(error){
                        $('#view').append('<p class="error">' + error + '</p>');
                    });
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

        //Message d'erreur dans la div de vue car au moins un champ est vide
        $('#view').html('<p class="error">Tous les champs doivent être remplis !</p>');
    }
});

//fonction permettant de charger l'overlay
function displayOverlay(){
    $('body').prepend(`
    <div class="overlay">
    <img src="images/ajaxloader.svg" alt="">
    </div>
    `);
}

//Fonction permettant de supprimer l'Overlay avec son icone de chargement
function removeOverlay(){
    $('.overlay').remove();
}