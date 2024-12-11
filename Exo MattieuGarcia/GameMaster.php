<?php
require_once 'Dice.php';
require_once 'Coin.php';
require_once 'Deck.php';
require_once 'RandomResult.php';

class GameMaster
{
    private $diceList = [];
    private $deckList = [];
    private $coinList = [];
    private $successRate;
    private $critRate;
    private $fumbleRate;

    public function __construct($successRate = 40, $critRate = 15, $fumbleRate = 5)
    {
        $this->successRate = $successRate;
        $this->critRate = $critRate;
        $this->fumbleRate = $fumbleRate;

        // Ajout des dés
        $this->diceList[] = new Dice(6);
        $this->diceList[] = new Dice(20);

        // Ajout des decks de cartes
        $this->deckList[] = new Deck(3, 18);
        $this->deckList[] = new Deck(4, 13);

        // Ajout des pièces
        $this->coinList[] = new Coin();
        $this->coinList[] = new Coin();

        $this->log("GameMaster initialized with success rate: $successRate%, crit rate: $critRate%, fumble rate: $fumbleRate%.");
    }

    public function pleaseGiveMeACrit()
    {
        // Choisir un type de matériel au hasard
        $materialType = rand(1, 3);

        if ($materialType === 1) {
            $material = $this->diceList[array_rand($this->diceList)];
            $result = $material->roll();
        } elseif ($materialType === 2) {
            $material = $this->deckList[array_rand($this->deckList)];
            $result = $material->draw();
        } else {
            $material = $this->coinList[array_rand($this->coinList)];
            $result = $material->flip();
        }

        // Déterminer le type de résultat en fonction des probabilités
        $randomNumber = rand(1, 100);
        if ($randomNumber <= $this->successRate) {
            $finalResult = RandomResult::SUCCESS;
        } elseif ($randomNumber <= $this->successRate + $this->critRate) {
            $finalResult = RandomResult::CRITICAL_SUCCESS;
        } elseif ($randomNumber <= $this->successRate + $this->critRate + $this->fumbleRate) {
            $finalResult = RandomResult::FUMBLE;
        } else {
            $finalResult = RandomResult::FAILURE;
        }

        $this->log("Final result: $finalResult");
        return $finalResult;
    }

    public function log($message)
    {
        echo $message . PHP_EOL;
    }
}
