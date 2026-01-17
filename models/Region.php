<?php
class Region {
    private $idRegion;
    private $nomRegion;

    public function __construct($id, $nom)
    {
        $this->setIdRegion($id);
        $this->setNomRegion($nom);
    }

    public function getIdRegion()
    {
        return $this->idRegion;
    }
    public function setIdRegion($idRegion)
    {
        $this->idRegion = $idRegion;
    } 
    public function getNomRegion()
    {
        return $this->nomRegion;
    }
    public function setNomRegion($nomRegion)
    {
        $this->nomRegion = $nomRegion;
    }
}