<?php
require_once __DIR__ . '/../repositories/VilleRepository.php';

if(!empty($_POST['departement'])){
    VilleRepository::displayVille($_POST['departement']);
}

//// fonction pour la recherche manuelle
if(!empty($_POST['search'])){
    VilleRepository::displayVillesForSearch($_POST['search']);
}