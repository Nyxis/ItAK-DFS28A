<?php
namespace GameMaster;
include_once('Result.php');
include_once('./Interface/Tirage.php');

//Une classe qui represente un dé
class De implements Tirage 
{
    private int $_lNbrFace;

    //Permettre creer un de avec le nbr de face en parametre
    public function __construct(int $pNbrFace)
    {
        $this->_lNbrFace = $pNbrFace;
    }

    public function getValeurTirage() : Result
    {
        //Recuperer l'attribut
        $lMax = $this->_lNbrFace;
        //Choisir un nombre par hasard entre 1 et le maximum
        $lValeur = rand(1,$lMax);
        //Return l'objet du resultat
        return new Result($lValeur, $lMax);
    }
}