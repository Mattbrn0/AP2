<?php
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerConcours.php'));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ConcoursController();
    
    $resultatsConcours = $controller->getConcoursById($_GET['id']);
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
<form action="resultats_concours.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <div class="row g-3">
        <div class="md-5">
        </div>
    </div>
    <input type="submit" value="Valider" class="btn btn-primary mt-3">
</form>
</body>
