<?php
require_once 'ClassPerso.php';
require_once 'Stuff.php';

class Personnage
{
    private $name;
    private $baseStats;
    private $characterClass;
    private $equipment = [];

    private $rapidite;

    private $force;


    public function __construct($name, $baseStats, ClassPerso $characterClass)
    {
        $this->name = $name;
        $this->baseStats = $baseStats;
        $this->characterClass = $characterClass;
    }

    public function addEquipment(Stuff $equipment)
    {
        $this->equipment[] = $equipment;
    }

       
    public function getRapidite()
    {
        return $this->rapidite;
    }

    public function getForce()
    {
        return $this->force;
    }

    
    public function getStats()
    {
        $finalStats = $this->baseStats;

        // Apply class modifiers
        foreach ($this->characterClass->getModifiers() as $stat => $modifier) {
            $finalStats[$stat] += $modifier;
        }

        // Apply equipment modifiers
        foreach ($this->equipment as $equip) {
            foreach ($equip->getModifiers() as $stat => $modifier) {
                $finalStats[$stat] += $modifier;
            }
        }

        return $finalStats;
    }

    public function log($message)
    {
        echo $message . PHP_EOL;
    }
}
