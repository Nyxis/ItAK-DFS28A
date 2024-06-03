<?php

enum TypeEnum : string
{
    case SUCCESS = 'success';
    case FAILURE = 'failure';
    case CRITICAL_SUCCESS = 'critical_success';
    case FUMBLE = 'fumble';
}

class Tirage
{
    public function __construct(
        private TypeEnum $type,
    ) {

    }

    public function getType(): string
    {
        return $this->type->value;
    }
}

interface RandomTirage {
    public function lancer();
}

class De implements RandomTirage
{
    public function __invoke(int $faces) {
        return $faces > 1;
    }

    public function __construct(
        private int $faces,
    ) {

    }

    public function lancer() {
        return rand(1, $this->faces);
    }
}

class Piece implements RandomTirage
{
    public function __invoke(int $nbLancers) {
        return $nbLancers > 1;
    }

    public function __construct(
        private int $nbLancers,
    ) {

    }

    public function lancer() {
        if ($this->nbLancers == 0) {
            return 1;
        }
        $this->nbLancers--;
        return rand(0, 1) * $this->lancer();
    }
}

class Deck implements RandomTirage
{
    public function __invoke(int $couleurs, int $valeurs) {
        return $couleurs > 1 || $valeurs > 1;
    }

    public function __construct(
        private int $couleurs, 
        private int $valeurs
    ) {

    }

    public function lancer() {
        $couleur = rand(1, $this->couleurs);
        $valeur = rand(1, $this->valeurs);
        return ($couleur - 1) * $this->valeurs + $valeur;
    }
}

class GameMaster 
{
    public function __construct(
        private array $elements,
    ) {
    }

    public function pleaseGiveMeACrit() {
        $element = $this->elements[array_rand($this->elements)];
        $roll = $element->lancer();
        return $this->calculateResult($roll);
    }

    private function calculateResult($value) {
        $percent = rand(1, 100);

        switch($percent) {
            case $percent <= 5:
                return new Tirage(TypeEnum::FUMBLE);
                break;
            case $percent <= 20:
                return new Tirage(TypeEnum::CRITICAL_SUCCESS);
                break;
            case $percent <= 60:
                return new Tirage(TypeEnum::SUCCESS);
                break;
            default:
            return new Tirage(TypeEnum::FAILURE);
                break;
        }
    }
}

$dice4 = new De(4);
$dice10 = new De(10);
$deck1 = new Deck(3, 18);
$deck2 = new Deck(4, 13);
$coin1 = new Piece(1);
$coin2 = new Piece(1);

$elements = [$dice4, $dice10, $deck1, $deck2, $coin1, $coin2];
$gm = new GameMaster($elements);

$result = $gm->pleaseGiveMeACrit();
echo "Result: " . $result->getType();