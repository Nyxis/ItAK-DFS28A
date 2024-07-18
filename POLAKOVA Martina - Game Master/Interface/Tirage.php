<?php
namespace GameMaster;
//include_once('../Classe/Result.php');

//Modéliser un comportement correspondant au tirage des valeurs aléatoires
interface Tirage {
    //Méthode pour lancer le dé/pièce/tirer un cart
    public function getValeurTirage() : Result;
}