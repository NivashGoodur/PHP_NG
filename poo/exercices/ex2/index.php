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


        $this->battery = $newBattery;
        $this->started = $newStarted;
        $this->simCard = $newSimCard;
        $this->color = $newColor;
        $this->brand = $newBrand;
    }

    /**
     * Fonction permettant à un utilisateur d'appeler quelqu'un en précisant en paramètre le numéro à appeler
     */
    public function call($numberToCall){

        if($this->started){

            if($this->battery > 0){

                if($this->simCard){
                    echo 'Appel en cours du numéro ' . $numberToCall . '...<br>';
                    $this->battery -= 5;
                    echo 'Appel terminé, 5% de batterie ont été consommés, il en reste ' . $this->battery . '%<br>';
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
     * Fonction permettant à un utilisateur d'envoyer un sms à quelqu'un en précisant en paramètre le numéro et le message
     */
    public function sendSMS($numberToCall, $message){
        if($this->started){

            if($this->battery > 0){

                if($this->simCard){
                    $this->battery -= 2;
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
            $this->started = true;
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

            $this->battery = 100;
            echo 'La batterie a chargée de ' . $oldLevel . '% à ' . $this->battery . '%<br>';
        } else {
            $oldLevel = $this->battery;

            $this->battery += 20;
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
            $this->simCard = true;
            echo 'Insertion de la carte SIM réussi !<br>';
        }

    }
}


$samsung = new Phone('0', 'false', 'true', 'samsung', 'black');
$honor = new Phone('10', 'false', 'true', 'honor', 'white');
$onePlus = new Phone('10', 'false', 'true', 'oneplus', 'white');
