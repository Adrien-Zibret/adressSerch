<?php

require_once __DIR__ . '/../repositories/DepartementRepository.php';

if(!empty($_POST['region'])){
    DepartementRepository::displayDepartement($_POST['region']);
}