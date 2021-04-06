<?php

class Warrior extends Character{

    protected $energyPoint;

    /**
     * Getters
     */
    public function getEnergyPoint(){
        return $this->energyPoint;
    }

     /**
     * Setters
     */
    public function setEnergyPoint(int $energyPoint){
        $this->energyPoint = $energyPoint;
    }

    /**
     * Construct
     */
    public function __construct($name, $lifePoint, $attackPoint, $energyPoint){

        parent::__construct($name, $lifePoint, $attackPoint);
        $this->setEnergyPoint($energyPoint);
    }

    public function talk(){
        echo 'Salutations, je suis un guerrier du nom de '. $this->name .'. J\'ai '. $this->lifePoint .' points de vie avec '. $this->attackPoint .' point d\'attaque et il me reste '. $this->energyPoint .' d\'énergie pour attaquer!';
    }
}