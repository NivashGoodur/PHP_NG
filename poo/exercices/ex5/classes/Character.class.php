<?php

/**
 * Classe abstraite qui servira par héritage à donner aux sous classes tous les éléments permettant le bon fonctionnement d'un personnage
 */
abstract class Character{

    /**
     * Attributs des personnages
     */
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
    public function setName(string $newName){
        $this->name = $newName;
    }

    public function setLifePoint(int $newLifePoint){
        $this->lifePoint = $newLifePoint;
    }

    public function setAttackPoint(int $newAttackPoint){
        $this->attackPoint = $newAttackPoint;
    }

    /**
     * Constructeur de classe qui permettra d'hydrater les guerriers créés
     */
    public function __construct($newName, $newLifePoint, $newAttackPoint){

        $this->setName($newName);
        $this->setLifePoint($newLifePoint);
        $this->setAttackPoint($newAttackPoint);
    }

    /**
     * Méthodes abstraites que les sous classes seront obligées de créer
     */
    abstract function talk();
    abstract function attack(Character $target);

}