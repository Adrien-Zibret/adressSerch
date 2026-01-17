<?php

require_once __DIR__ . '/../models/Region.php';
require_once __DIR__ . '/../config/Database.php';

class RegionRepository {
    public static function getAllRegions():array
    {
        $regions = [];

        $bdd = Database::connect();
        $query = 'SELECT * from region';
        $state = $bdd->prepare($query);
        $state->execute();
        while($data = $state->fetch(PDO::FETCH_ASSOC)){
            $region = new Region($data['id_region'], $data['nom_region']);
            $regions[] = $region;
        }

        return $regions;
    }
}