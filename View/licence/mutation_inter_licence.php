<?php
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerLicences.php'));

if($_SERVER['REQUEST_METHOD'] === 'POST') {
$controller = new LicencesController();
$controller->changerClubLicence();
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
    <h2 class="text-center mb-4">Mutation Inter Comités</h2>
    <div class="container-fluid mt-5">
    <form action="mutation_inter_licence.php" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="numLicencie" class="form-label">Numéro licence :</label>
                    <select id="numLicencie" name="numLicencie" class="form-select" required>
                        <option value="">Sélectionner un licencié</option>
                        <?php
                        $controller = new LicencesController();
                        $result = $controller->getLicencie();
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['numlicencie'] . '">' . $row['numlicencie'] . ' - ' . $row['nomlicencie'] . ' ' . $row['prenomlicencie'] . '</option>';
                        }
                        ?>
                    </select>
                    
                </div>
                <!-- Get Club numeroaffiliation -->
                <div class="col-md-6">
                    <label for="numeroaffiliation" class="form-label">Club :</label>
                    <select id="numeroaffiliation" name="numeroaffiliation" class="form-select" required>
                        <option value="">Sélectionner un club</option>
                        <?php
                        $controller = new LicencesController();
                        $result = $controller->getClubs();
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['numeroaffiliation'] . '">' . $row['designationclub'] . '</option>';
                        }
                        ?>
                    </select>
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
