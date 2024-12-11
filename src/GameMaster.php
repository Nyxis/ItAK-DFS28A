<?php
require_once 'De.php';
require_once 'Piece.php';
require_once 'Deck.php';
require_once 'ResultatTirage.php';
class GameMaster {

private $des = [];
private $decks = [];
private $pieces = [];

public function __construct() {
// Ajout des dés
$this->des[] = new De(6);
$this->des[] = new De(10);
$this->des[] = new De(20);

// Ajout des decks
$this->decks[] = new Deck(3, 18);
$this->decks[] = new Deck(4, 13);

// Ajout des pièces
$this->pieces[] = new Piece(1);
$this->pieces[] = new Piece(2);
}

public function lancerTout() {
foreach ($this->des as $de) {
$de->lancer();

}

foreach ($this->decks as $deck) {
$deck->lancer();
}

foreach ($this->pieces as $piece) {
$piece->lancer();
}
}

public function obtenirResultats() {
$resultats = [
'des' => [],
'decks' => [],
'pieces' => []
];

foreach ($this->des as $de) {
$resultats['des'][] = $de->getResultat();
}

foreach ($this->decks as $deck) {
$resultats['decks'][] = $deck->getResultat();
}

foreach ($this->pieces as $piece) {
$resultats['pieces'][] = $piece->getResultat();
}

return $resultats;
}

    public function obtenirTauxReussite() {
        $tauxReussite = [
            'des' => [],
            'decks' => [],
            'pieces' => []
        ];

        foreach ($this->des as $de) {
            $taux = $de->calculTauxReussite();
            $resultatTirage = new ResultatTirage($taux);
            $tauxReussite['des'][] = $resultatTirage->getResultatTirage();
        }

        foreach ($this->decks as $deck) {
            $taux = $deck->calculTauxReussite();
            $resultatTirage = new ResultatTirage($taux);
            $tauxReussite['decks'][] = $resultatTirage->getResultatTirage();
        }

        foreach ($this->pieces as $piece) {
            $taux = $piece->calculTauxReussite();
            $resultatTirage = new ResultatTirage($taux);
            $tauxReussite['pieces'][] = $resultatTirage->getResultatTirage();
        }

        return $tauxReussite;
    }

}
