<?php
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerLicences.php'));

$controller = new LicencesController();

// Récupérer les valeurs des champs de recherche
$searchNom = isset($_POST['searchNom']) ? $_POST['searchNom'] : '';
$searchPrenom = isset($_POST['searchPrenom']) ? $_POST['searchPrenom'] : '';
$searchNumLicence = isset($_POST['searchNumLicence']) ? $_POST['searchNumLicence'] : '';

// Utiliser les valeurs des champs de recherche pour obtenir les licenciés correspondants
$licences = $controller->searchLicencie($searchNom, $searchPrenom, $searchNumLicence);
?>