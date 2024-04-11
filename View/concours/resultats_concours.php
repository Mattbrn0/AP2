<?php
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerConcours.php'));

// Déclaration de la variable $id_concours
$id_concours = null;

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si la valeur du champ 'club_organisateur' est définie dans la requête POST
    if (isset($_POST['club_organisateur'])) {
        // Récupérer la valeur du champ 'club_organisateur'
        $id_concours = $_POST['club_organisateur'];
    } else {
        // Afficher un message d'erreur si la valeur du champ 'club_organisateur' n'est pas définie
        echo "Erreur : Identifiant du concours non défini.";
        exit; // Arrêter l'exécution du script
    }
}

// Récupérer l'ID du concours sélectionné dans l'URL
if (isset($_GET['id_concours'])) {
    // Récupérer la valeur de l'ID du concours depuis l'URL
    $id_concours = $_GET['id_concours'];
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
<form action="traitement.php?id_concours=<?php echo $id_concours; ?>" method="post">
    <input type="hidden" name="id_concours" value="<?php echo $id_concours; ?>">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="nom">Nom de la compétition :</label>
            <select id="club_organisateur" name="club_organisateur" class="form-select" required>
                <option value="">Sélectionner un concours</option>
                <?php
                $controller = new ConcoursController();
                $result = $controller->getConcours();
                while ($row = $result->fetch_assoc()) {
                    $selected = ($id_concours == $row['id']) ? 'selected' : '';
                    echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['id'] . ' - ' .
                    $row['club_organisateur'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <input type="submit" value="Valider" class="btn btn-primary mt-3">
</form>
</body>
</html>