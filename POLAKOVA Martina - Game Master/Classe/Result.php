<?php
namespace GameMaster;

//Une classe qui represente le resultat d'un tirage
class Result {
    private int $_lValeurOriginal;
    private int $_lMax;
    private string $_lResultatFinal;

    //Creer l'objet avec les valeur du tirage et maximum possible, determiner le resultat reel
    public function __construct(int $pValeurTirage, int $pMax)
    {
        $this->_lValeurOriginal = $pValeurTirage;
        $this->_lMax = $pMax;
        $this->determinerResultat();
    }

    //Transformer le resultat en pourcentage pour determiner Succes / Crit / Echec / Fumble
    public function determinerResultat() 
    {
        //Recuperer le pourcentage de ce tirage
        $lResultatPourcentage = floor($this->_lValeurOriginal / $this->_lMax * 100);
        //Determiner le type de resultat selon la valeur en fonction des % parametrees :
        //Les valeurs de critique / succès / échec / fumble sont pour le moment fixées à 15% / 40% / 40% / 5%
        switch (true)
        {
            case $lResultatPourcentage < 6 :
                $this->_lResultatFinal = 'fumble';
                break;
            case $lResultatPourcentage < 46 :
                $this->_lResultatFinal = 'échec';
                break;
            case $lResultatPourcentage < 86 :
                $this->_lResultatFinal = 'succès';
                break;
            case $lResultatPourcentage < 101 :
                $this->_lResultatFinal = 'succès critique';
                break;
            default :
                $this->_lResultatFinal = 'erreur de recuperation resultat';
                break;
        }
    }

    //Getter pour acceder le resultat
    public function getResultatFinal() 
    {
        return $this->_lResultatFinal;
    }
}