<?php

namespace App\JDR;

require __DIR__ . '/Autoloader.php';
Autoloader::register();

use App\JDR\Class\De;
use App\JDR\Class\Deck;
use App\JDR\Class\Piece;
use App\JDR\Class\GameMaster;

$dice4 = new De(4);
$dice10 = new De(10);
$deck1 = new Deck(3, 18);
$deck2 = new Deck(4, 13);
$coin1 = new Piece(1);
$coin2 = new Piece(1);

$elements = [$dice4, $dice10, $deck1, $deck2, $coin1, $coin2];
$gm = new GameMaster($elements);

$result = $gm->pleaseGiveMeACrit();
echo "Résultat : " . $result->getType();