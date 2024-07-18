<?php
namespace GameMaster;
include_once('Result.php');
include_once('./Interface/Tirage.php');

//Une classe representante le pièce
class Piece implements Tirage 
{
    private int $_lNbrLance;

    //Creer une piece avec nbr des lances precise, si pas de precision, aleatoire
    public function __construct(int $pNbrLances = 0) 
    {
        if($pNbrLances == 0)
        {
            $this->_lNbrLance = rand(1,20);
        } else $this->_lNbrLance = $pNbrLances;
    }

    //Permettre de lances le piece le nobre de fois specifie et retourner le pourcentage de reussite
    public function getValeurTirage() : Result
    {
        //Variables locals
        $lNbrLanceTotal = $this->_lNbrLance;
        $lValeur;
        $lNbrLanceActuel = 1;
        $lPosValCounter = 0;
        //Lance le piece le nbr des fois specifie.
        do {
            //Lancer le piece
            $lValeur = rand(0,1);
            //Ajout la valeur au compteur
            if($lValeur = 1) 
            {
                $lPosValCounter ++;
            }
            //Augmente le nbr des lances effectues
            $lNbrLanceActuel ++;
        } 
        //Repete jusqu'à le nombre des lances specifie
        while ($lNbrLanceActuel < $lNbrLanceTotal);
       //Return l'objet du resultat
       return new Result($lPosValCounter, $lNbrLanceTotal);
    }
}