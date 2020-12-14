<?php

//Exercice 10-a : Afficher la date avec la fonction date sous le format suivant: "friday 11 december 2020, 14h 55m 30s"


//echo date('l d F Y, H\h i\m s\s');


//Exercice 10-b : Chercher à afficher la date avec strftime en français en vous aidant de google et de php.net
//Format attendu : "vendredi 11 décembre 2020, 15h 21m 30s"
//echo'<br>';

//setlocale (LC_TIME, 'fr_FR.utf8','fra');
//echo (strftime("%A %d %B %Y, %Hh %Mm %Ss"));


//Ex 10-c:
/* Avec la fonction date () afficher à l'écran la date qu'il sera dans 26jours et 16h sous le format suivant : 2020-12-11 06:42:30*/

/*
echo date('Y-m-d H:i:s', time()+2304000);
echo'<br>';
echo time()+2304000;
*/



//Ex 10-d : Créer une variable contenant cette date précise textuelle : "2004-04-16 12:00:00". Le but est d'ajouter 435 jours à cette date puis de l'afficher sous la forme suivant : "samedi 25 juin 2005, 06h 00m 00s" str datetime?

setlocale (LC_TIME, 'fr_FR.utf8','fra');

$dateToTransform = '2004-04-16 12:00:00';

$dateToTransformTimestamp = strtotime($dateToTransform);

$newDateTimestamp = $dateToTransformTimestamp + 435*24*60*60;
echo strftime('%A %d %B %Y, %H %Mm %Ss', $newDateTimestamp);