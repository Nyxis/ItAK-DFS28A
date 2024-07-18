<?php

class ResultatTirage {
    const REUSSITE = 'réussite';
    const ECHEC = 'échec';
    const REUSSITE_CRITIQUE = 'réussite critique';
    const ECHEC_CRITIQUE = 'échec critique';

    private $resultat_tirage;
    private $tauxReussite;

    public function __construct($tauxReussite) {
        $this->tauxReussite = $tauxReussite;
        $this->calculReussite();
    }

    private function calculReussite() {
        if ($this->tauxReussite >= 40) {
            $this->resultat_tirage = self::REUSSITE;
        } elseif ($this->tauxReussite < 40 && $this->tauxReussite >= 15) {
            $this->resultat_tirage = self::REUSSITE_CRITIQUE;
        } elseif ($this->tauxReussite < 15 && $this->tauxReussite >= 5) {
            $this->resultat_tirage = self::ECHEC;
        } else {
            $this->resultat_tirage = self::ECHEC_CRITIQUE;
        }
    }

    public function getResultatTirage() {
        return $this->resultat_tirage;
    }

}
