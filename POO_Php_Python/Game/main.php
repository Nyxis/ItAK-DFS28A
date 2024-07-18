<?php 

namespace App\Game;

require_once __DIR__ . '/Autoloader.php';
Autoloader::register();

use App\Game\class\Coin;
use App\Game\class\Deck;
use App\Game\class\Dice;
use App\Game\class\Roller;
use App\Game\classes\GameMaster as ClassesGameMaster;

[$_, $arg1, $arg2, $arg3] = $argv;

$success = $arg1;
$crit = $arg2;
$fumble = $arg3;

$dice = [
    new Dice(6),
    new Dice(10),
    new Dice(20)
];

$decks = [
    new Deck(3,18),
    new Deck(4,13)
];

$coins = [
    new Coin(2),
    new Coin(6)
];

$roller = new Roller();

$gameMaster = new ClassesGameMaster($dice, $decks, $coins, $roller);

echo $gameMaster->pleaseGiveMeACrit();

?>