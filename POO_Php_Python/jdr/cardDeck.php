<?php
class CardDeck {

    public $score;
    public $nb_colors;
    public $nb_values;
    public $best_result;

    public function __construct($nb_colors = 4, $nb_values = 13) {
        $this->nb_colors = $nb_colors;
        $this->nb_values = $nb_values;
        $this->score = $this->PickCard();
    }

    public function PickCard() {

        $cards = array();
        for ($i = 0; $i < $this->nb_values; $i++) {
            switch ($i) {
                case  $this->nb_values - 4:
                    $card = "valet";
                    break;
                case $this->nb_values - 3:
                    $card = "dame";
                    break;
                case $this->nb_values - 2:
                    $card = "roi";
                    break;
                case $this->nb_values - 1:
                    $card = "as";
                    break;
                default:
                    $card = $i + 2;
                    break;
            }
            $cards[$i] = $card;
        }
        shuffle($cards);
        $resultCard = $cards[0];

        $colors = array();
        for ($j = 0; $j < $this->nb_colors; $j++) {
            switch ($j) {
                case  0:
                    $color = "coeur";
                    break;
                case 1:
                    $color = "pique";
                    break;
                case 2:
                    $color = "carreau";
                    break;
                case 3:
                    $color = "trefle";
                    break;
            }
            $colors[$j] = $color;
        }
        shuffle($colors);
        $resultColor = $colors[0];

        if ($cards[0] == 2) {
            $score = "Resultat paquet " . $this->nb_colors . " couleurs " . $this->nb_values . " valeurs : " . $resultCard . " de " . $resultColor . " --> echec critique";
            return $score;
        }
        elseif ($cards[0] == "as") {
            $score = "Resultat paquet " . $this->nb_colors . " couleurs " . $this->nb_values . " valeurs : " . $resultCard . " de " . $resultColor . " --> reussite critique";
            return $score;
        }
        elseif ($cards[0] == "roi" || $cards[0] == "dame" || $cards[0] == "valet" || $cards[0] >= (($this->nb_values - 4) / 2) + 3) {
            $score = "Resultat paquet " . $this->nb_colors . " couleurs " . $this->nb_values . " valeurs : " . $resultCard . " de " . $resultColor . " --> reussite";
            return $score;
        }
        else {
            $score = "Resultat paquet " . $this->nb_colors . " couleurs " . $this->nb_values . " valeurs : " . $resultCard . " de " . $resultColor . " --> echec";
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