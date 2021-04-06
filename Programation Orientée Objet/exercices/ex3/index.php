<?php

// Exercice 1 :
// Créer une nouvelle classe "Phone" qui devra contenir au moins 5 attributs et au moins 5 méthodes qui réutilisent des attributs de l'objet.

/**
 * Classe matérialisant des téléphones
 */
class Phone{

    private $battery;
    private $started;
    private $simCard;
    private $color;
    private $brand;

    public function __construct($newBattery, $newStarted, $newSimCard, $newColor, $newBrand){


        $this->setBattery($newBattery);
        $this->setStarted ($newStarted);
        $this->setSimCard ($newSimCard);
        $this->setColor ($newColor);
        $this->setBrand ($newBrand);
    }

    /**
     * Fonction permettant à un utilisateur d'appeler quelqu'un en précisant en paramètre le numéro à appeler
     */
    public function call($numberToCall){

        if($this->started){

            if($this->battery > 0){

                if($this->simCard){
                    echo 'Appel en cours du numéro ' . $numberToCall . '...<br>';
                    $this->setBattery ($this->battery - 5);
                    echo 'Appel terminé, 5% de batterie ont été consommés, il en reste ' . $this->battery . '%<br>';
                } else {
                    echo 'Pour passer un appel, il faut insérer une carte SIM !<br>';
                }

            } else {
                $this->setStarted(false);
                echo 'Le téléphone n\'a plus de batterie, il s\'est éteint !<br>';
            }

        } else {
            echo 'Appel impossible car le téléphone est éteint !<br>';
        }

    }

    /**
     * Fonction permettant à un utilisateur d'envoyer un sms à quelqu'un en précisant en paramètre le numéro et le message
     */
    public function sendSMS($numberToCall, $message){
        if($this->started){

            if($this->setBattery > 0){

                if($this->simCard){
                    $this->setBattery($this->battery - 2);
                    echo 'Le sms "' . $message . '" a bien été envoyé au numéro ' . $numberToCall . '. 2% de batterie ont été consommés, il en reste ' . $this->battery . '%<br>';
                } else {
                    echo 'Pour passer un appel, il faut insérer une carte SIM !<br>';
                }

            } else {
                $this->started = false;
                echo 'Le téléphone n\'a plus de batterie, il s\'est éteint !<br>';
            }

        } else {
            echo 'Appel impossible car le téléphone est éteint !<br>';
        }
    }

    /**
     * Fonction permettant de démarrer le telephone
     */
    public function start(){

        if($this->battery >= 10){
            $this->setStarted(true);
            echo 'Le téléphone démarre !<br>';
        } else {
            echo 'Pas assez de batterie pour démarrer !<br>';
        }

    }

    /**
     * Fonction permettant de charger le telephone
     */
    public function charge(){

        if($this->battery == 100){
            echo 'Le téléphone est complètement chargé !<br>';
        } else if($this->battery > 80) {
            $oldLevel = $this->battery;

            $this->setBattery(100);
            echo 'La batterie a chargée de ' . $oldLevel . '% à ' . $this->battery . '%<br>';
        } else {
            $oldLevel = $this->battery;

            $this->setBattery($this->battery + 20);
            echo 'La batterie a chargée de ' . $oldLevel . '% à ' . $this->battery . '%<br>';
        }
    }

    /**
     * Fonction permettant d'inserer une carte SIM
     */
    public function setSIMCard(){

        if($this->simCard){
            echo 'Il y a déjà une carte SIM !<br>';
        } else {
            $this->setSimCard(true);
            echo 'Insertion de la carte SIM réussi !<br>';
        }

    }

    /**
     * Setters
     */
    public function getBattery(){
        return $this->battery;
    }

    public function getStarted(){
        return $this->started;
    }

    public function getSimCard(){
        return $this->simCard;
    }

    public function getColor(){
        return $this->color;
    }

    public function getBrand(){
        return $this->brand;
    }

    /**
     * Setters
     */

    public function setBattery(int $newBattery){
        if($newBattery >= 0 && $newBattery <= 100){
            $this->battery = $newBattery;
        }else{
            trigger_error('Setbattery n\'accepte que des entiers entre 1 et 100 inclus', E_USER_ERROR);
        }
    }


    public function setStarted(bool $newStarted){
        $this->started = $newStarted;
    }

    public function insertSIMCard(bool $newSimCard){
        $this->simCard = $newSimCard;
    }


    public function setBrand(string $newBrand){
        $this->brand = $newBrand;
    }


    public function setColor(string $newColor){
        $this->color = $newColor;
    }
}


$samsung = new Phone('5', false, true, 'noir', 'samsung');
$honor = new Phone('10', true, true, 'blanc', 'honor');
$onePlus = new Phone('10', true, false, 'rose', 'oneplus');



$samsung->setColor('bleu');
$samsung->setBrand('samsung');
$samsung->setBattery(10);

$honor->setBattery(100);
// $honor->setBrand('honor');
$honor->setColor('rouge');

$onePlus->setBattery(50);
// $onePlus->setBrand('oneplus');
$onePlus->setColor('bleu');

echo 'Ce téléphone est un : '. $samsung->getBrand() . ' de couleur ' . $samsung->getColor() . ' , il lui reste '. $samsung->getBattery() . ' % de batterie <br>';

echo 'Ce téléphone est un : '. $honor->getBrand() . ' de couleur ' . $honor->getColor() . ' , il lui reste '. $honor->getBattery() . ' % de batterie <br>';

echo 'Ce téléphone est un : '. $onePlus->getBrand() . ' de couleur ' . $onePlus->getColor() . ' , il lui reste '. $onePlus->getBattery() . ' % de batterie <br>';