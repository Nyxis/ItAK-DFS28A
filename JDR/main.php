<?php

namespace App\JDR;

require __DIR__ . '/Autoloader.php';
Autoloader::register();

use App\JDR\Class\De;
use App\JDR\Class\Deck;
use App\JDR\Class\Piece;
use App\JDR\Class\GameMaster;
use App\JDR\Class\Logger;
use InvalidArgumentException;

if (!$argc == 4) {
    Logger::log("Paramètres manquants, utilisation des valeurs par défaut");
    Logger::log("Utilisation avec les taux: php main.php <success_rate> <crit_rate> <fumble_rate>");
    
    $argv = [
        40,
        15,
        5,
    ];
} else {
    $argv = [
        ...array_filter($argv, function ($el) {
            return is_numeric($el);
        })
    ];
}

$successRate = (float)$argv[0];
$critRate = (float)$argv[1];
$fumbleRate = (float)$argv[2];

$dice4 = new De(4);
$dice10 = new De(10);
$deck1 = new Deck(3, 18);
$deck2 = new Deck(4, 13);
$coin = new Piece(1);

try {
    $elements = [$dice4, $dice10, $deck1, $deck2, $coin, $coin];
    $gm = new GameMaster($elements, $successRate, $critRate, $fumbleRate);

    $result = $gm->pleaseGiveMeACrit();
    echo "Résultat : " . $result->getType();
} catch (InvalidArgumentException $th) {
    echo $th->getMessage();
}
