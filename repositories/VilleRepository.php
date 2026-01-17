<?php
require_once __DIR__ . '/../models/Ville.php';
require_once __DIR__ . '/../config/Database.php';

class VilleRepository
{
    public static function getVilleByIdDept($idD): array
    {
        $villes = [];
        $bdd = Database::connect();
        //// dans la table ville, il y a un espace pour la corrse ' 2A' et ' 2B' mais pas dans la table departement
        if ($idD === '2A' || $idD === '2B') {
            if ($idD === '2A') {
                $query = 'SELECT * from ville where id_departement = " 2A" order by nom_ville';
                $state = $bdd->prepare($query);
                $state->execute();
            } else if ($idD === '2B') {
                $query = 'SELECT * from ville where id_departement = " 2B" order by nom_ville';
                $state = $bdd->prepare($query);
                $state->execute();
            }
        } else {
            $query = 'SELECT * from ville where id_departement = :idD order by nom_ville';
            $state = $bdd->prepare($query);
            $state->execute([
                'idD' => $idD,
            ]);
        }
        while ($data = $state->fetch(PDO::FETCH_ASSOC)) {
            // J'ai intervertis le code postal et le code insee dans la base de donnée
            $ville = new Ville($data['id_ville'], $data['nom_ville'], $data['code_postal'], $data['code_insee'], $data['id_departement']);
            $villes[] = $ville;
        }

        return $villes;
    }

    public static function displayVille($idD): void
    {
?>
        <select class="form-select" name="ville">
            <?php
            $villes = VilleRepository::getVilleByIdDept($idD);
            foreach ($villes as $ville): ?>
                <option value="<?= $ville->getIdVille() ?>"><?= $ville->getNomVille() . ' - ' . $ville->getCodeInsee() ?></option>
            <?php endforeach; ?>
        </select>
    <?php
    }

    ////////// méthodes pour la recherche manuelle
    public static function getVilleBySearch($chaine): array
    {
        $villes = [];

        $bdd = Database::connect();
        /// le if pour différencier le nom de la ville de son code postal => codeinsee parce que j'ai intervertis les deux ;)
        if(is_numeric($chaine)){
            $query = 'SELECT * from ville where substring(code_insee, 1, :len) = :chaine order by nom_ville';
        } else if (!is_numeric($chaine)){
            $query = 'SELECT * from ville where substring(nom_ville, 2, :len) = :chaine order by nom_ville';
        }
        $state = $bdd->prepare($query);
        $state->execute([
            'len' => strlen($chaine),
            'chaine' => $chaine,
        ]);
        while ($data = $state->fetch(PDO::FETCH_ASSOC)) {
            $ville = new Ville($data['id_ville'], $data['nom_ville'], $data['code_postal'], $data['code_insee'], $data['id_departement']);
            $villes[] = $ville;
        }
        return $villes;
    }

    public static function displayVillesForSearch($chaine): void
    {
    ?>
        <select class="form-select" name="villesBySearch" id="villesBySearch">
            <?php
            $villes = VilleRepository::getVilleBySearch($chaine);
            foreach ($villes as $ville): ?>
                <option value="<?= $ville->getIdVille() ?>"><?= $ville->getNomVille() . ' - ' . $ville->getCodeInsee() ?></option>
            <?php endforeach; ?>
        </select>
    <?php
    }
}
?>
