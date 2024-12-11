<?php
class Coin {

    public $results;
    public $drawCount;
    public $choosen_face;

    public function __construct($drawCount = 3, $choosen_face = "face") {

        $this->drawCount = $drawCount;
        $this->choosen_face = $choosen_face;
        $this->score = $this->ThrowCoin();
    }

    public function ThrowCoin() {

        $results = array();
        for ($i = 0; $i < $this->drawCount; $i++) {
            $result = rand(1,2);
            if ($result == 1) {
                $result = "pile";
            }
            else {
                $result = "face";
            }
            $results[$i] = $result;
        }
        $counter = 0;
        foreach ($results as $value) {
            if ($value == $this->choosen_face) {
                $counter++;
            }
        }
        if ($counter == 0) {
            $score = "Resultat piece " . $this->drawCount . " lancé : " . implode(", ", $results) . " --> echec critique";
            return $score;
        }
        elseif ($counter == $this->drawCount) {
            $score = "Resultat piece " . $this->drawCount . " lancé : " . implode(", ", $results) . " --> reussite critique";
            return $score;
        }
        elseif ($counter >= $this->drawCount/2) {
            $score = "Resultat piece " . $this->drawCount . " lancé : " . implode(", ", $results) . " --> reussite";
            return $score;
        }
        else {
            $score = "Resultat piece " . $this->drawCount . " lancé : " . implode(", ", $results) . " --> echec";
            return $score;
        }
        return $results;
    }

    public function getResults() {

        return $this->results;
    }

    public function __toString() {

        return $this->score . "\n";
    }
}
?>