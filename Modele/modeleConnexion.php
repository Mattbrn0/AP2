<?php

require_once (realpath(dirname(__FILE__) . '/../Controller/DAOConnect.php'));

session_start();

// Connexion à la base de données
$mysqli = DAOConnect::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $mot_de_passe = $_POST['password'];

    $sql = "SELECT id, mot_de_passe FROM utilisateurs WHERE login = '$login'";
    $result = $mysqli->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['mot_de_passe'];

        if (password_verify($mot_de_passe, $hashed_password)) {
            // Mot de passe correct, mettre à jour la dernière connexion dans la base de données
            $utilisateur_id = $row['id'];
            $date_connexion = date('Y-m-d H:i:s', strtotime('+1 hour')); // Ajouter 1 heure à l'heure actuelle
            $sql_update = "UPDATE utilisateurs SET derniere_connexion = '$date_connexion' WHERE id = $utilisateur_id";

            if ($mysqli->query($sql_update)) {
                $_SESSION['utilisateur_id'] = $utilisateur_id;
                header("Location: ../view/tableau_de_bord.php");
                exit();
            } else {
                echo "Erreur lors de la mise à jour de la dernière connexion: " . $mysqli->error;
            }
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Login incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</
