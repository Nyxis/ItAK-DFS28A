<?php
require_once 'Personnage.php';

class Rencontre
{
    private $critRate;
    private $successRate;
    private $failureRate;
    private $fumbleRate;
    private $baseVitalityLoss;
    private $bonusEquipment;

    public function __construct($critRate, $successRate, $failureRate, $fumbleRate, $baseVitalityLoss, $bonusEquipment)
    {
        $this->critRate = $critRate;
        $this->successRate = $successRate;
        $this->failureRate = $failureRate;
        $this->fumbleRate = $fumbleRate;
        $this->baseVitalityLoss = $baseVitalityLoss;
        $this->bonusEquipment = $bonusEquipment;
    }

    public function calculateRates(Personnage $personnage)
    {
        // Apply modifiers based on character's stats
        $modifiers = [];

        // Example modifiers based on character's stats
        if ($personnage->getRapidite() <= 5) {
            $modifiers['fumble'] = 5;
        }

        if ($personnage->getForce() >= 10) {
            $modifiers['crit'] = 5;
        }

        // Apply modifiers to rates
        $critRate = $this->critRate + ($modifiers['crit'] ?? 0);
        $successRate = $this->successRate;
        $failureRate = $this->failureRate;
        $fumbleRate = $this->fumbleRate + ($modifiers['fumble'] ?? 0);

        return [
            'crit' => $critRate,
            'success' => $successRate,
            'failure' => $failureRate,
            'fumble' => $fumbleRate
        ];
    }

    // Getter methods for other properties can be added if needed
}