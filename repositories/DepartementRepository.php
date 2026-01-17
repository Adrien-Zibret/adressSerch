<?php
require_once __DIR__ . '/../models/Departement.php';
require_once __DIR__ . '/../config/Database.php';

class DepartementRepository {
    public static function getDeptByIdRegion($idR):array
    {
        $departements = [];
        $bdd = Database::connect();
        $query = 'SELECT * from departement where id_region = :idR';
        $state = $bdd->prepare($query);
        $state->execute([
            'idR' => $idR,
        ]);
        while($data = $state->fetch(PDO::FETCH_ASSOC)){
            $departement = new Departement($data['id_departement'], $data['nom_departement'], $data['id_region']);
            $departements[] = $departement;
        }

        return $departements;
    }

    public static function displayDepartement($idR):void
    {   
        ?> 
        <select class="form-select" name="departement" onclick="refreshVille(this.value)">
        <?php        
        $departements = DepartementRepository::getDeptByIdRegion($idR);
        foreach($departements as $departement): ?>
            <option value="<?= $departement->getIdDepartement() ?>"><?= $departement->getNomDepartement() ?></option>
        <?php endforeach; ?>
        </select>
        <?php
    }
}