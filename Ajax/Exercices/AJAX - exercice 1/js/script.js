
//Raccourcis vers la div de vue et les boutons
let view = document.querySelector('.view');
let buttons = document.querySelectorAll('.button-area>button');

//On parcours  la liste des boutons
buttons.forEach(function(button){

    //Application d'un ecouteur click sur chaque bouton
    button.addEventListener('click', function(){

        //Création de la requête AJAX
        let xhr = new XMLHttpRequest();

        //Construction du lien de la page à charger en récupérant le data-page du bouton cliqué (this)
        xhr.open('GET', 'content/' + this.dataset.page);
        xhr.send(null);
        xhr.addEventListener('readystatechange', function(){

            //Si la requête est revenue
            if(xhr.readyState === XMLHttpRequest.DONE){

                //Si la page a bien été trouvée
                if(xhr.status === 200){

                    //Inclusion du code de la page dans la div de vue
                    view.innerHTML = xhr.responseText;
                }
            }
        });
    });
});