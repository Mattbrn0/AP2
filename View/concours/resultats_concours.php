<?php
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerConcours.php'));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ConcoursController();
    $controller->resultatConcours();
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $nom = $_POST["nom"];
    $date = $_POST["date"];
    $equipes = intval($_POST["equipes"]); // Convertit en nombre entier
    $categorie = $_POST["categorie"];

    // Calcul des valeurs de résultats en fonction du nombre d'équipes et de la catégorie
    $gagnant = 0;
    $finaliste = 0;

    if ($equipes > 64) {
        if ($categorie == "B") {
            $gagnant = 8;
            $finaliste = 6;
        } else {
            $gagnant = 5;
            $finaliste = 4;
        }
    } elseif ($equipes > 32) {
        if ($categorie == "B") {
            $gagnant = 6;
            $finaliste = 4;
        } else {
            $gagnant = 4;
            $finaliste = 3;
        }
    } elseif ($equipes > 16) {
        if ($categorie == "B") {
            $gagnant = 4;
            $finaliste = 3;
        } else {
            $gagnant = 3;
            $finaliste = 2;
        }
    } else {
        $gagnant = 2;
        $finaliste = 1;
    }

    // Affiche les résultats ou enregistre-les dans une base de données ou un fichier
    echo "Résultats de la compétition '$nom' le $date :<br>";
    echo "Gagnant: $gagnant points<br>";
    echo "Finaliste: $finaliste points<br>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat d'un concours - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h2>Résultat d'une compétition</h2>
<form action="traitement.php" method="post">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="nom">Nom de la compétition :</label>
            <input type="text" id="nom" name="nom" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="equipes">Nombre d'équipes :</label>
            <input type="number" id="equipes" name="equipes" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="categorie">Catégorie :</label>
            <select id="categorie" name="categorie" class="form-select">
                <option value="B">Grille B</option>
                <option value="C">Grille C</option>
            </select>
        </div>
    </div>
    <input type="submit" value="Valider" class="btn btn-primary mt-3">
</form>


</body>