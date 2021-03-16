<?php

// require 'classes/Character.class.php';
// require 'classes/Wizard.class.php';
// require 'classes/Warrior.class.php';

function call($className){
    require 'classes/' . $className . '.class.php';
}

//Enregistrement de l'autoloader auprès de PHP
spl_autoload_register('call');

try{


    $conan = new Warrior('Conan', 1000, 200, 80);
    $gandalf = new Wizard('Gandalf', 800, 260, 150);

    $conan->talk();
    $gandalf->talk();


    $conan->attack($gandalf);
    $gandalf->attack($conan);
    $conan->attack($gandalf);
    $gandalf->attack($conan);
    $conan->attack($gandalf);
    $gandalf->attack($conan);
    $conan->attack($gandalf);
    $gandalf->attack($conan);




} catch(TypeError $e){
    die('<p style="color:red;">Erreur PHP : ' . $e . '</p>');
} catch(Exception $e){
    die('<p style="color:red;">Erreur PHP : ' . $e . '</p>');
} catch(Error $e){
    die('<p style="color:red;">Erreur PHP : ' . $e . '</p>');
}


