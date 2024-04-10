<?php
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerLicences.php'));

if($_SERVER['REQUEST_METHOD'] === 'POST') {
$controller = new LicencesController();
$controller->ajouterLicence();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actions - FFBSQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2 class="text-center mb-4">Création d'un Licencié</h2>
    <div class="container-fluid mt-5">
    <form action="creation_licence.php" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="numLicencie" class="form-label">Numéro licencié :</label>
                    <input type="text" id="numLicencie" name="numLicencie" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="nomlicencie" class="form-label">Nom licencie:</label>
                    <input type="text" id="nomlicencie" name="nomlicencie" class="form-control" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100 mt-3">Valider</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>