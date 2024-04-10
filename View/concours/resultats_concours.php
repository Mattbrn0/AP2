<?php
require_once(realpath(dirname(__FILE__) . '/../../Controller/controllerConcours.php'));

// Vérifier s'il s'agit d'une requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ConcoursController();
    $resultatsConcours = $controller->getConcoursById($_GET['id']);

    if ($resultatsConcours) {
        $data = [
            'id' => $_GET['id']
        ];
        
        // Effectuer des actions avec $data si nécessaire

        // Redirection vers une page de succès
        header("Location: ../view/page_success.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat d'un concours - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2>Résultat d'une compétition</h2>
    <form action="club_organisateur.php" method="post">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nom">Nom de la compétition :</label>
                <select id="club_organisateur" name="club_organisateur" class="form-select" required>
                    <option value="">Sélectionner un concours</option>
                    <?php
                    $controller = new ConcoursController();
                    $result = $controller->getConcours();
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['club_organisateur'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <input type="submit" value="Valider" class="btn btn-primary mt-3">
    </form>
</body>
</html>
