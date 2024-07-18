<?php

class De
{

    private $faces_de;
    private $resultat_de;

    public function __construct($faces_de)
    {
        $this->faces_de = $faces_de;
    }

    public function lancer()
    {
        $this->resultat_de = mt_rand(1, $this->faces_de);
        return $this->resultat_de;
    }

    public function calculTauxReussite()
    {
        return ($this->resultat_de * 100) / $this->faces_de;
    }

    public function getResultat()
    {
        return $this->resultat_de;
    }
}