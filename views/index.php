<?php
require_once __DIR__ . '/../repositories/RegionRepository.php';
$regions = RegionRepository::getAllRegions();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="../ajax/departement.js"></script>
    <script src="../ajax/ville.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <h1 class="text-center my-2">Recherche de ville depuis la base de donnée</h1>
            <div class="col-lg-6 col-6">
                <h2>Recherche de ville avec Ajax et JQuery</h2>
                <div>
                    <select class="form-select" name="region" id="region" onclick="refreshDepartement(this.value)">
                        <?php foreach ($regions as $region): ?>
                            <option value="<?= $region->getIdRegion() ?>"><?= $region->getNomRegion() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div id="departement"></div>
                <div id="ville"></div>
            </div>
            <!-- Recherche manuelle de la ville -->
            <div class="col-6 col-lg-6">
                <h2>Recherche libre</h2>
                <input class="form-control" onkeyup="refreshVilleBySearch(this.value)" placeholder="Entrez le nom de la ville ou le code postal" type="text" name="search">
                <div id="searchResult"></div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <h1 class="mx-auto text-center my-2">Recherche de ville depuis l'Api BAN</h1>
        <div class="col-6 col-lg-6 mx-auto">
            <input type="text" name="adresse" id="adresse" class="form-control" placeholder="adresse">
            <input type="text" name="cp" id="cp" class="form-control" placeholder="cp">
            <input type="text" name="ville1" id="ville1" class="form-control" placeholder="ville">

        </div>
    </div>

    <script src="../ajaxApi/adresse.js"></script>
    <script src="../ajaxApi/cp.js"></script>
    <script src="../ajaxApi/ville.js"></script>
</body>

</html>