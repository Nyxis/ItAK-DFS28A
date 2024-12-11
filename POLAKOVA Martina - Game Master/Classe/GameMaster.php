<?php
namespace GameMaster;
//4/ Créez maintenant une classe GameMaster.
//- Un GameMaster dispose d'un nombre de dés conséquents de différents types, de deux decks de cartes l'un de trois couleurs de et 18 valeurs, le deuxième de 4 couleurs de 13 valeurs, et de deux pièces.
// - un GameMaster peut effectuer des tirages via la méthode `pleaseGiveMeACrit`. Le GameMaster sélectionne l'une des instances de Dice / Deck et Coin au hasard et renvoie une constante correspondant au type de résultat. Les valeurs de succès / critique / fumble sont pour le moment fixées à 40% / 15% / 5%.

class GameMaster 
{
    private array $_materiel;

    public function __construct(array $pMateriel)
    {
        $this->_materiel = $pMateriel;
        
    }   

    public function pleaseGiveMeACrit ()
    {
        //Choisir un materiel aleatoire
        $lIndexChoix = rand(0, count($this->_materiel)-1) ;
        //Appeler la methode pour lancer/tirer le materiel
        $lResult = $this->_materiel[$lIndexChoix] -> getValeurTirage();
        return $lResult;
    }
}