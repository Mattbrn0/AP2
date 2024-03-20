<?php
session_start();
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: connexion.php");
    exit();
}

require_once (realpath(dirname(__FILE__) . '/../Modele/modeleUtilisateur.php'));

$utilisateur_id = $_SESSION['utilisateur_id'];

$userInfo = getUserInfo($utilisateur_id);

?>
