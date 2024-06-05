<?php

namespace App\JDR;

require __DIR__ . '/Autoloader.php';
Autoloader::register();

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

try {
    $gm = new GameMaster($successRate, $critRate, $fumbleRate);

    $result = $gm->pleaseGiveMeACrit();
    echo "Résultat : " . $result->getType();
} catch (InvalidArgumentException $th) {
    echo $th->getMessage();
}
