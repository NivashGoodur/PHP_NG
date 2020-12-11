<?php

//Exercice 1 :
function print_rv2 ($array_pre){
    echo '<pre>';
    print_r($array_pre);
    echo'</pre>';

}


$fruits = ['Pomme', 'Poire', 'Cerise', 'Kiwi'];
//$test = ['test1', 'test2', 'test3', 'test4'];

print_rv2($fruits);



//Exercice 2 :

function getTTCPrice($price_ht, $tva){
    return $price_ht/100*$tva +$price_ht;
}

echo getTTCPrice(100,10);

?>