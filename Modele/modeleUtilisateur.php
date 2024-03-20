<?php
require_once (realpath(dirname(__FILE__) . '/../Controller/DAOConnect.php'));

function getUserInfo($utilisateur_id) {
    // Connexion à la base de données
    $mysqli = DAOConnect::getInstance();

    $sql = "SELECT nom, prenom, derniere_connexion FROM utilisateurs WHERE id = $utilisateur_id";
    $result = $mysqli->query($sql);
    return ($result && $result->num_rows === 1) ? $result->fetch_assoc() : false;
}
?>
