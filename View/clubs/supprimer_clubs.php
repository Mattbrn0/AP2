<?php
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerClubs.php'));

if (isset($_GET['id'])) {
    $numeroAffiliation = $_GET['id'];
    $controller = new ClubsController();
    $controller->SupprimerClubs($numeroAffiliation);
} else {
    echo "Numéro d'affiliation non spécifié.";
}
?>
