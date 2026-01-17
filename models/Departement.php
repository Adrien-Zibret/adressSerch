<?php

class Departement {
    private $idDepartement;
    private $nomDepartement;
    private $idRegion;

    public function __construct($idD, $nom, $idR)
    {
        $this->setIdDepartement($idD);
        $this->setNomDepartement($nom);
        $this->setIdRegion($idR);
    }

    public function getIdDepartement()
    {
        return $this->idDepartement;
    }
    public function setIdDepartement($idDepartement)
    {
        $this->idDepartement = $idDepartement;
    }
    public function getNomDepartement()
    {
        return $this->nomDepartement;
    }
    public function setNomDepartement($nomDepartement)
    {
        $this->nomDepartement = $nomDepartement;
    } 
    public function getIdRegion()
    {
        return $this->idRegion;
    }
    public function setIdRegion($idRegion)
    {
        $this->idRegion = $idRegion;
    }
}