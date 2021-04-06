<?php

/**
 * Classes finale (non héritable) qui hérite de character, permettant de créer des guerriers
 */
final class Warrior extends Character{

    /**
     * Attributs des guerriers
     */
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
    public function setEnergyPoint(int $newEnergyPoint){
        $this->energyPoint = $newEnergyPoint;
    }

    /**
     * Constructeur de classe qui permettra d'hydrater les guerriers créés
     */
    public function __construct($newName, $newLifePoint, $newAttackPoint, $newEnergyPoint){

        parent::__construct($newName, $newLifePoint, $newAttackPoint);
        $this->setEnergyPoint($newEnergyPoint);

    }

    /**
     * Méthode permettant aux guerriers de se présenter via une phrase affichée à l'écran
     */
    public function talk(){

        if($this->getLifePoint() < 1){
            echo $this->getName() . ' ne peut pas parler car il est mort =(<br>';
        } else {
            echo 'Salutations, je suis un Guerrier du nom de ' . $this->getName() . '. J\'ai ' . $this->getLifePoint() . ' points de vie, ' . $this->getAttackPoint() . ' points d\'attaques et il me reste encore ' . $this->getEnergyPoint() . ' points d\'énergie pour attaquer.<br>';
        }

    }

    /**
     * Méthode permettant aux guerriers d'attaquer quelqu'un d'autre
     */
    public function attack(Character $target){

        // Vérifier que l'attaquant n'est pas mort
        if($this->getLifePoint() > 0){

            // Vérifier que l'attaquant a assez d'énergie
            if($this->getEnergyPoint() >= 15){

                // Génération d'un nombre aléatoire comme multiplicateur pour la valeur d'attaque
                $randomNumber = rand(1,20) / 10;

                // Arrondi de la force de base du joueur multipliée par le nombre aléatoire
                $attaqueValue = round($this->getAttackPoint() * $randomNumber);

                // Vérification que la victime n'est pas déjà morte
                if($target->getLifePoint() < 1){
                    echo 'L\'attaque de ' . $this->getName() . ' contre ' . $target->getName() . ' a échouée car ' . $target->getName() . ' est déjà mort !<br>';
                } else {

                    // Retrait d'un peu d'énergie à l'attaque (fatigue dûe à l'attaque)
                    $this->setEnergyPoint( $this->getEnergyPoint() - 15 );

                    // Si les points de vie de la victime sont plus petit que la valeur d'attaque, il meurt et passe à 0
                    if($target->getLifePoint() <= $attaqueValue){

                        $target->setLifePoint(0);

                        echo $this->getName() . ' attaque ' . $target->getName() . ', lui inflige ' . $attaqueValue . ' points de dégât et le tue !<br>';
                    } else {

                        // Retrait aux points de vie des dégâts reçus
                        $target->setLifePoint( $target->getLifePoint() - $attaqueValue );
                        echo  $this->getName() . ' attaque ' . $target->getName() . ' et lui inflige ' . $attaqueValue . ' points de dégât, il lui reste maintenant ' . $target->getLifePoint() . ' points de vie !<br>';

                    }

                }

            } else {

                $this->setEnergyPoint( $this->getEnergyPoint() + 20 );
                echo $this->getName() . ' n\'a plus assez d\'énergie, il se repose et en regagne 20 !<br>';
            }

        } else {
            echo $this->getName() . ' ne peut pas attaquer car il est mort !<br>';
        }

    }

}