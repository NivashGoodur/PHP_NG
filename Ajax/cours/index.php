<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .view{
            background-color: red;
            color:white;
            width:800px;
            height:200px;
            padding:25px;
        }
        button{
            margin-top:10px;
        }
    </style>
</head>
<body>
    <div class="view"></div>
    <button>Charger le contenu de la page content.php</button>


<script>

        //Écouteur d'évènement click sur le bouton
        document.querySelector('button').addEventListener('click', function(){


            //Création de la nouvelle requête AJAX
            let xhr = new XMLHttpRequest();

            //Paramétrage de la requête AJAX (verbe HTTP et page cible)
            xhr.open('GET', 'content.php');

            //Envoi de la requête AJAX (null = pas de données envoyées avec la requête)
            xhr.send(null);

            //Écoute du retour de la requête AJAX
            xhr.addEventListener('readystatechange', function(){

                //Si la requête est terminée
                if(xhr.readyState === XMLHttpRequest.DONE){

                    //Si le code HTTP est bien 200 (200 = page trouvée avec succès)
                    if(xhr.status === 200){

                        //Insertion du code source récupéré de la page cible dans la div roige(.view)
                        document.querySelector('.view').textContent = xhr.responseText;
                    }else{

                        //Insertion de l'erreur dans la div rouge (.view)
                        document.querySelector('.view').textContent = 'Erreur de récupération :' + xhr.status;
                    }
                }
            })
        })


    </script>
</body>
</html>