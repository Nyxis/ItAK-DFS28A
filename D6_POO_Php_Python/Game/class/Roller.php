<?php 

namespace App\Game\class;

class Roller {
    public function rollElement($element) {
        $result = $element->roll();

        if ($result <= 5) {
            return Draw::FUMBLE;
        } elseif ($result <= 20) {
            return Draw::FAILURE;
        } elseif ($result <= 60) {
            return Draw::SUCCESS;
        } else {
            return Draw::CRITICAL_SUCCESS;
        }
    }
}

?>