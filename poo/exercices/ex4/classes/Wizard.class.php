<?php


class Wizard extends Character{

    protected $magicPoint;

    public function getMagicPoint(){
        return $this->magicPoint;
    }

    public function setMagicPoint(int $newMagicPoint){
        $this->magicPoint = $newMagicPoint;
    }

    public function __construct($newName, $newLifePoint, $newAttackPoint, $newMagicPoint){

        parent::__construct($newName, $newLifePoint, $newAttackPoint);
        $this->setMagicPoint($newMagicPoint);

    }

    public function talk(){

        if($this->getLifePoint() < 1){
            echo $this->getName() . ' ne peut pas parler car il est mort =(<br>';
        } else {
            echo 'Salutations, je suis un Magicien du nom de ' . $this->getName() . '. J\'ai ' . $this->getLifePoint() . ' points de vie, ' . $this->getAttackPoint() . ' points d\'attaques et il me reste encore ' . $this->getMagicPoint() . ' points de magie pour attaquer.<br>';
        }
    }

    public function attack(Character $target){

        if($this->getLifePoint() > 0){

            if($this->getMagicPoint() >= 25){

                $randomNumber = rand(1,30) / 10;

                $attaqueValue = round($this->getAttackPoint() * $randomNumber);

                if($target->getLifePoint() < 1){
                    echo 'L\'attaque de ' . $this->getName() . ' contre ' . $target->getName() . ' a échouée car ' . $target->getName() . ' est déjà mort !<br>';
                } else {

                    $this->setMagicPoint( $this->getMagicPoint() - 25 );

                    if($target->getLifePoint() <= $attaqueValue){

                        $target->setLifePoint(0);

                        echo $this->getName() . ' attaque ' . $target->getName() . ', lui inflige ' . $attaqueValue . ' points de dégât et le tue !<br>';
                    } else {

                        $target->setLifePoint( $target->getLifePoint() - $attaqueValue );
                        echo  $this->getName() . ' attaque ' . $target->getName() . ' et lui inflige ' . $attaqueValue . ' points de dégât, il lui reste maintenant ' . $target->getLifePoint() . ' points de vie !<br>';

                    }

                }

            } else {

                $this->setMagicPoint( $this->getMagicPoint() + 20 );
                echo $this->getName() . ' n\'a plus assez d\'énergie, il se repose et en regagne 20 !<br>';
            }

        } else {
            echo $this->getName() . ' ne peut pas attaquer car il est mort !<br>';
        }

    }

}