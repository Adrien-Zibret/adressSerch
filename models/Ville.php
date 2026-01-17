<?php

class Ville
{
    private $idVille;
    private $nomVille;
    private $codePostal;
    private $codeInsee;
    private $idDepartement;

    public function __construct($idV, $nom, $cp, $ci, $idD) 
    {
        $this->setIdVille($idV);
        $this->setNomVille($nom);
        $this->setCodePostal($cp);
        $this->setCodeInsee($ci);
        $this->setIdDepartement($idD);
    }

    public function getIdVille()
    {
        return $this->idVille;
    }
    public function setIdVille($idVille)
    {
        $this->idVille = $idVille;
    }
    public function getNomVille()
    {
        return $this->nomVille;
    }
    public function setNomVille($nomVille)
    {
        $this->nomVille = $nomVille;
    }
    public function getCodePostal()
    {
        return $this->codePostal;
    }
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }
    public function getCodeInsee()
    {
        return $this->codeInsee;
    }
    public function setCodeInsee($codeInsee)
    {
        $this->codeInsee = $codeInsee;
    }
    public function getIdDepartement()
    {
        return $this->idDepartement;
    }
    public function setIdDepartement($idDepartement)
    {
        $this->idDepartement = $idDepartement;
    }
}
