<?php

namespace App\JDR;

require __DIR__ . '/Autoloader.php';
spl_autoload_register(new Autoloader(Autoloader::class));

use App\JDR\Class\De;
use App\JDR\Class\Deck;
use App\JDR\Class\GameMaster;
use App\JDR\Class\Action;
use App\JDR\Class\Logger;
use App\JDR\Class\Piece;
use InvalidArgumentException;

$argv = [
    ...array_filter($argv, function ($el) {
        return is_numeric($el);
    })
];

$elements = [
    new De(4),
    new De(10),
    new Deck(3, 18),
    new Deck(4, 13),
    new Piece(1),
    new Piece(1),
];
$gm = new GameMaster($elements);

if (!count($argv) == 4) {
    Logger::log("Paramètres manquants, utilisation des valeurs par defaut");
    Logger::log("Utilisation avec les taux: php main.php <success_rate> <crit_rate> <fumble_rate>");

    $action = new Action();
} else {
    $action = new Action(
        (int)$argv[0],
        (int)$argv[1],
        (int)$argv[2],
    );
}

try {
    $result = $gm->pleaseGiveMeACrit($action);
    echo "Resultat : " . $result->getType();
    exit($result->getValue());
} catch (InvalidArgumentException $th) {
    echo $th->getMessage();
}
