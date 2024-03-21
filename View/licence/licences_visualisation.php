<?php
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerLicences.php'));

$controller = new LicencesController();

$licences = $controller->getLicencie();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualiser les licenciés - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-4">Liste des licenciés</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Numéro licence</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Action</th> <!-- Ajouter une colonne pour l'action -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($licences as $licence) : ?>
                    <tr>
                        <td><?php echo $licence['numlicencie']; ?></td>
                        <td><?php echo $licence['nomlicencie']; ?></td>
                        <td><?php echo $licence['prenomlicencie']; ?></td>
                        <td> <!-- Colonne pour le bouton "Modifier" -->
                         <button onclick="loadContent('uniLicencie.php?id=<?php echo $licence['numlicencie']; ?>')" class="btn btn-primary">Modifier</button> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>