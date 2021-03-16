<?php
namespace Vehicules\Moteurs\Aeriens;

class Avion{

    protected $color;
    /**
     * @return string
     */
    public function getColor(){
        return $this->color;
    }

    /**
     * @param string $newColor Paramètre contenant la couleur à changer dans l'objet
     */
    public function setColor($newColor){
        $this->color = $newColor;
    }
}

$test = new Avion();

$test->setColor();