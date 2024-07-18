<?php 

namespace App\Game\classes;

    
class GameMaster {
    //use App\Game\Loggable;
    private $dice;
    private $decks;
    private $coins;
    private $roller;
    
    public function __construct ($dice, $decks, $coins, $roller) {
        $this -> dice = $dice;
        $this -> decks = $decks;
        $this -> coins = $coins;
        $this -> roller = $roller;
    }

    public function pleaseGiveMeACrit () {
        $elements = array_merge($this -> dice, $this -> decks, $this -> coins);
        $element = $elements[array_rand($elements)];
        return $this -> roller -> rollElement($element);
    }
    
}

?>