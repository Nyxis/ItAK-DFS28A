<?php

class Deck {
    private $nb_couleurs;
    private $nb_valeurs;

    public function __construct($nb_couleurs, $nb_valeurs) {
        $this->nb_couleurs = $nb_couleurs;
        $this->nb_valeurs = $nb_valeurs;
    }

    public function lancer() {
        $couleur = mt_rand(1, $this->nb_couleurs);
        $valeur = mt_rand(1, $this->nb_valeurs);
        return $couleur * $valeur;
    }

    public function calculTauxReussite() {
        $resultat_deck = $this->lancer();
        $tauxReussite = ($resultat_deck * 100) / ($this->nb_couleurs * $this->nb_valeurs);
        return $tauxReussite;
    }
    public function getResultat() {
        return $resultat_deck = $this->lancer();
    }

}
