<?php
namespace GameMaster;
include_once('Result.php');
include_once('./Interface/Tirage.php');

//Une classe qui represente un deck de cartes
class DeckDeCartes implements Tirage 
{
    //Attributs privees
    private int $_lNbrCouleurs;
    private int $_lNbrValeurs;

    //Permettre de creer une instance de ce classe avec le nbr de couleurs et valeurs parametre
    function __construct(int $pNbrCouleurs, int $pNbrValeurs){
        $this->_lNbrCouleurs = $pNbrCouleurs;
        $this->_lNbrValeurs = $pNbrValeurs;
    }

    //Methode pour obtenir un resultat de tirage avec ce objet
    public function getValeurTirage() : Result
    {
        //Tirage de couleur
        $lCouleur = $this->tirageCards($this->_lNbrCouleurs);
        //Tirage de valeur
        $lValeur = $this->tirageCards($this->_lNbrValeurs);
        //Le resultat de ce tirage
        $lResultat = rand(1,($lCouleur*$lValeur));
        //Determine le max possible pour ce tirage
        $lMax = ($this->_lNbrCouleurs)*($this->_lNbrValeurs);
        //Return l'objet du resultat
        return new Result($lResultat, $lMax);
    }

    //Methode pour faire le tirage specifique pour obtenir la couleur et la valeur de card
    private function tirageCards(int $pNbrOptions) : int
    {
        //Tirage aleatoire
        $lValeurTirage = rand(1, $pNbrOptions);
        return $lValeurTirage;
    }

}