<?php

require 'classes/Character.class.php';
require 'classes/Warrior.class.php';
require 'classes/Wizard.class.php';

try{

    $warrior1 = new Warrior('gandalf', 100, 10, 20);
    $wizzard1 = new Wizard('magicien', 100, 10, 20);



    $warrior1->talk();
    echo'<br>';
    $wizzard1->talk();


} catch(TypeError $e){
    die('<p style="color:red;">Erreur PHP : ' .$e.'</p>');
} catch(Exception $e){
    die('<p style="color:red;">Erreur PHP : ' .$e.'</p>');
} catch(Error $e){
    die('<p style="color:red;">Erreur PHP : ' .$e.'</p>');
}