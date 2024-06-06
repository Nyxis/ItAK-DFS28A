<?php

namespace App\JDR\Class;

use App\JDR\Class\Logger;
use App\JDR\Class\Tirage;
use App\JDR\Enum\TypeEnum;

class Action
{
    public function __construct(
        private int $successRate = 40,
        private int $critRate = 15,
        private int $fumbleRate = 5,
    ) {
    }

    public function calculateResult($value) {
        Logger::log('Résultat du lancer : ' . $value);

        switch($value) {
            case $value <= $this->fumbleRate:
                return new Tirage(TypeEnum::FUMBLE, $value);
                break;
            case $value <= $this->fumbleRate + $this->critRate:
                return new Tirage(TypeEnum::CRITICAL_SUCCESS, $value);
                break;
            case $value <= $this->fumbleRate + $this->critRate + $this->successRate:
                return new Tirage(TypeEnum::SUCCESS, $value);
                break;
            default:
                return new Tirage(TypeEnum::FAILURE, $value);
                break;
        }
    }
}