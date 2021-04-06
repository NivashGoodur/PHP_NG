<?php

abstract class Character{

    protected $name;
    protected $lifePoint;
    protected $attackPoint;


    /**
     * Getters
     */
    public function getName(){
        return $this->name;
    }

    public function getLifePoint(){
        return $this->lifePoint;
    }

    public function getAttackPoint(){
        return $this->attackPoint;
    }


    /**
     * Setters
     */
    public function setName(string $name){
        $this->name = $name;
    }

    public function setLifePoint(int $lifePoint){
        $this->lifePoint = $lifePoint;
    }

    public function setAttackPoint(int $attackPoint){
        $this->attackPoint = $attackPoint;
    }

    public function __construct($name, $lifePoint, $attackPoint){

        $this->setName($name);
        $this->setLifePoint($lifePoint);
        $this->setAttackPoint($attackPoint);
    }

    abstract function talk();

    public function attack($attaquant, $victime){
        
    }
}