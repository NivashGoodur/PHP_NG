//Raccourci vers la div de vue
let view = $('.view');

//Mise en place d'un écouteur d'évènement click sur tous les boutons
$('.button-area>button').click(function(){

    //Requête AJAX sur la page dont le lien est construit en récupérant le data-page du bouton cliqué (this)
    $.get('content/' + $(this).data('page') , function(data){

        //Inclusion du code de la page dans la div de vue
        view.html(data);
    }).fail(function(){

        //Affichage d'une erreur en cas de prolème
        view.text('Problème avec la requête !');
    });


});