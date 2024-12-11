<?php

class Piece
{
    private $faces_piece;
    private $resultats = [];

    public function __construct($faces_piece)
    {
        $this->faces_piece = $faces_piece;
    }

    public function lancer()
    {
        $nombreLancers = mt_rand(1, 10);

        for ($i = 0; $i < $nombreLancers; $i++) {
            $resultat = mt_rand(0, $this->faces_piece - 1);
            $this->resultats[] = $resultat;
        }
    }



    public function getResultatLePlusFrequent()
    {
        $frequences = array_count_values($this->resultats);
        arsort($frequences);
        return array_key_exists(0, $frequences) && array_key_exists(1, $frequences) ?
            ($frequences[0] > $frequences[1] ? 0 : 1) :
            (array_key_exists(0, $frequences) ? 0 : 1);
    }

    public function calculTauxReussite() {
        if (empty($this->resultats)) {
            return 0;
        }

        $premierResultat = $this->resultats[0];
        $resultatsIdentiques = true;
        foreach ($this->resultats as $resultat) {
            if ($resultat !== $premierResultat) {
                $resultatsIdentiques = false;
                break;
            }
        }


        $tauxReussite = ($resultatsIdentiques) ? 100 : 0;

        return $tauxReussite;
    }


    public function getResultat() {
        return $this->resultats;
    }
}

?>


