<?php
require_once (realpath(dirname(__FILE__) . '/../Modele/modeleConnexion.php'));

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $mot_de_passe = $_POST['password'];

    $utilisateur_id = authenticateUser($login, $mot_de_passe);

    if ($utilisateur_id !== false) {
        if (updateLastLogin($utilisateur_id)) {
            $_SESSION['utilisateur_id'] = $utilisateur_id;
            header("Location: tableau_de_bord.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de la dernière connexion.";
        }
    } else {
        echo "Login ou mot de passe incorrect.";
    }
}
?>
