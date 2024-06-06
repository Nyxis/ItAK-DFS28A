<?php

namespace App\JDR\Class\Abstract;

use App\JDR\Class\Logger;
use App\JDR\Class\Tirage;
use App\JDR\Enum\TypeEnum;

abstract class AbstractGameMaster
{
    public function __construct(
        private int $successRate = 40,
        private int $critRate = 15,
        private int $fumbleRate = 5,
    ) {
    }

    public function setRates(array $rates) {
        foreach ($rates as $property => $value) {
            if(property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }

    protected function calculateResult($value) {
        Logger::log('Résultat du lancer : ' . $value);

        switch($value) {
            case $value <= $this->fumbleRate:
                return new Tirage(TypeEnum::FUMBLE);
                break;
            case $value <= $this->successRate:
                return new Tirage(TypeEnum::CRITICAL_SUCCESS);
                break;
            case $value <= $this->critRate:
                return new Tirage(TypeEnum::SUCCESS);
                break;
            default:
                return new Tirage(TypeEnum::FAILURE);
                break;
        }
    }
}