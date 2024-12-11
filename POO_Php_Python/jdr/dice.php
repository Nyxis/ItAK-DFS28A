<?php
class Dice {

    public $lower_face;
    public $nb_face;
    public $result;
    public $score;

    public function __construct($lower_face = 1, $nb_face = 6) {

        $this->lower_face = $lower_face;
        $this->nb_face = $nb_face;
        $this->score = $this->ThrowDice();
    }

    public function ThrowDice() {

        $result = rand($this->lower_face, $this->nb_face);

        if ($result == $this->lower_face) {
            $score = "Resultat dé " . $this->nb_face . " : " . $result . " -- > echec critique";
            return $score;
        }
        elseif ($result == $this->nb_face) {
            $score = "Resultat dé " . $this->nb_face . " : " . $result . " -- > reussite critique";
            return $score;
        }
        elseif ($result > $this->nb_face/2 && $result != $this->nb_face) {
            $score = "Resultat dé " . $this->nb_face . " : " . $result . " -- > reussite";
            return $score;
        }
        else {
            $score = "Resultat dé " . $this->nb_face . " : " . $result . " -- > echec";
            return $score;
        }
    }

    public function getResult() {

        return $this->result;
    }

    public function __toString() {

        return $this->score . "\n";
    }
}
?>