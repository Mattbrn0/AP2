<?php
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerClubs.php'));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ClubsController();
    $controller->ajouterClubs();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un club - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2 class="text-center mb-4">Création d'un club</h2>
    <div class="container-fluid mt-5">
    <form action="creation_clubs.php" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="numAffiliation" class="form-label">Numéro d'affiliation :</label>
                    <input type="number" id="numAffiliation" name="numAffiliation" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="Designation" class="form-label">Désignation :</label>
                    <input type="text" id="Designation" name="Designation" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="Adr_siege" class="form-label">Adresse du siège :</label>
                    <input type="text" id="Adr_siege" name="Adr_siege" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="Adr_cp_siege" class="form-label">Code postal du siège :</label>
                    <input type="number" id="Adr_cp_siege" name="Adr_cp_siege" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="Ville_siege" class="form-label">Ville du siège :</label>
                    <input type="text" id="Ville_siege" name="Ville_siege" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="Annee_filiation" class="form-label">Année de filiation:</label>
                    <input type="text" id="Annee_filiation" name="Annee_filiation" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="Tel_clubs" class="form-label">Numéro de téléphone :</label>
                    <input type="tel" id="Tel_clubs" name="Tel_clubs" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="Mail_clubs" class="form-label">Email :</label>
                    <input type="email" id="Mail_clubs" name="Mail_clubs" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="Adr_courrier" class="form-label">Adresse courrier :</label>
                    <input type="text" id="Adr_courrier" name="Adr_courrier" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="Adr_cp_courrier" class="form-label">Code postal courrier :</label>
                    <input type="number" id="Adr_cp_courrier" name="Adr_cp_courrier" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="Adr_ville_courrier" class="form-label">Ville courrier :</label>
                    <input type="text" id="Adr_ville_courrier" name="Adr_ville_courrier" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="Num_prefecture" class="form-label">Numéro de préfecture :</label>
                    <input type="text" id="Num_prefecture" name="Num_prefecture" class="form-control" required>
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
