<?php

class Wizard extends Character{

    protected $magicPoint;

    /**
     * Getters
     */
    public function getMagicPoint(){
        return $this->magicPoint;
    }

     /**
     * Setters
     */
    public function setMagicPoint(int $magicPoint){
        $this->magicPoint = $magicPoint;
    }

    /**
     * Construct
     */
    public function __construct($name, $lifePoint, $attackPoint, $magicPoint){

        parent::__construct($name, $lifePoint, $attackPoint);
        $this->setMagicPoint($magicPoint);
    }

    public function talk(){
        echo 'Salutations, je suis un Magicien du nom de '. $this->name .'. J\'ai '. $this->lifePoint .' points de vie avec '. $this->attackPoint .' point d\'attaque et il me reste '. $this->magicPoint .' de magie pour attaquer!';
    }
}