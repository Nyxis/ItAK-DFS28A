<?php
require_once 'GameMaster.php';

if ($argc < 4) {
    echo "Usage: php main.php <successRate> <critRate> <fumbleRate>\n";
    exit(1);
}

$successRate = (int)$argv[1];
$critRate = (int)$argv[2];
$fumbleRate = (int)$argv[3];


if ($successRate + $critRate + $fumbleRate > 100) {
    echo "The sum of successRate, critRate, and fumbleRate must not exceed 100.\n";
    exit(1);
}

$gm = new GameMaster($successRate, $critRate, $fumbleRate);
$result = $gm->pleaseGiveMeACrit();
echo 'Result: ' . $result . PHP_EOL;


switch ($result) {
    case RandomResult::SUCCESS:
        exit(0);
    case RandomResult::CRITICAL_SUCCESS:
        exit(1);
    case RandomResult::FUMBLE:
        exit(2);
    case RandomResult::FAILURE:
        exit(3);
}

require_once 'Personnage.php';
require_once 'CharacterClass.php';
require_once 'Equipment.php';

// Define character classes
$warriorClass = new ClassPerso('Guerrier', ['Force' => 2, 'Vitalité' => 1]);
$archerClass = new ClassPerso('Archer', ['Rapidité' => 2, 'Intelligence' => 1]);
$mageClass = new ClassPerso('Magicien', ['Intelligence' => 3]);

// Define equipments
$sword = new Stuff('Épée', ['Force' => 1]);
$bow = new Stuff('Arc', ['Rapidité' => 1]);
$staff = new Stuff('Bâton', ['Intelligence' => 2]);

// Create characters
$warrior = new Personnage('Barbarus', ['Force' => 10, 'Rapidité' => 5, 'Intelligence' => 3, 'Vitalité' => 7], $warriorClass);
$warrior->addEquipment($sword);

$archer = new Personnage('Archos', ['Force' => 5, 'Rapidité' => 8, 'Intelligence' => 4, 'Vitalité' => 5], $archerClass);
$archer->addEquipment($bow);

$mage = new Personnage('Wyzord', ['Force' => 3, 'Rapidité' => 4, 'Intelligence' => 10, 'Vitalité' => 6], $mageClass);
$mage->addEquipment($staff);

// Display character stats
echo 'Warrior stats: ';
print_r($warrior->getStats());

echo 'Archer stats: ';
print_r($archer->getStats());

echo 'Mage stats: ';
print_r($mage->getStats());


