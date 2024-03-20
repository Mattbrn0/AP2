<?php

require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerClubs.php'));

$controller = new ClubsController();

$clubs= $controller->getClubs();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualiser les Clubs - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-4">Liste des Clubs</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Désignation</th>
                    <th scope="col">Numéro d'affiliation</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Numéro de préfecture</th>
                    <th scope="col">informations</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clubs as $club) : ?>
                    <tr>
                        <td><?php echo $club['designationclub']; ?></td>
                        <td><?php echo $club['numeroaffiliation']; ?></td>
                        <td><?php echo $club['tel_siege']; ?></td>
                        <td><?php echo $club['mail_siege']; ?></td>
                        <td><?php echo $club['numero_prefecture']; ?></td>
                        <td><button onclick="loadContent('visualiser_licencies.php?id=<?php  echo $club['id'];?>')" class="btn btn-secondary">voir plus</button></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>