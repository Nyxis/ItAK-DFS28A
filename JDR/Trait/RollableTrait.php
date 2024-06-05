<?php

namespace App\JDR\Trait;

use App\JDR\Class\Logger;
use App\JDR\Class\Tirage;
use App\JDR\Enum\TypeEnum;

trait RollableTrait
{
    public function __construct(
        private float $successRate,
        private float $critRate,
        private float $fumbleRate
    ) {
    }

    private function calculateResult($value) {
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