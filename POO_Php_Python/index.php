<?php
include "jdr/cardDeck.php";
include "jdr/coin.php";
include "jdr/dice.php";
include "jdr/randomResult.php";
include "jdr/gameMaster.php";

$dice_6 = new Dice(1,6);
$dice_8 = new Dice(1,8);
$dice_10 = new Dice(1,10);
$dice_12 = new Dice(1,12);
$dice_20 = new Dice(1,20);
$coinflip_3 = new Coin(3,"face");
$coinflip_5 = new Coin(5,"pile");
$pickCard_4_13 = new CardDeck(4,13);
$pickCard_3_18 = new CardDeck(3,18);

$accessory = array ($dice_6, $dice_8, $dice_10, $dice_12, $dice_20, $coinflip_3, $coinflip_5, $pickCard_4_13, $pickCard_3_18);

for ($i = 0; $i < 40; $i++) {
    $game_master = new GameMaster(0,8);
    echo $accessory[$game_master->getResult()];
}

?>