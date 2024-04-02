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
                    <th scope="col">Numéro d'affiliation</th>
                    <th scope="col">Désignation</th>
                    <th scope="col">Adresse du siège</th>
                    <th scope="col">Code postal du siège</th>
                    <th scope="col">Ville du siège</th>
                    <th scope="col">Année de filiation</th>
                    <th scope="col">Numéro de téléphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adresse courrier</th>
                    <th scope="col">Code postal courrier</th>
                    <th scope="col">Ville courrier</th>
                    <th scope="col">Numero Prefecture</th>
                    <th scope="col">Nombre de licenciés</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clubs as $club) : ?>
                    <tr>
                        <td><?php echo $club['numeroaffiliation']; ?></td>
                        <td><?php echo $club['designationclub']; ?></td>
                        <td><?php echo $club['adresse_siege']; ?></td>
                        <td><?php echo $club['adr_cp_siege']; ?></td>
                        <td><?php echo $club['adr_ville_siege']; ?></td>
                        <td><?php echo $club['annee_affiliation']; ?></td>
                        <td><?php echo $club['tel_siege']; ?></td>
                        <td><?php echo $club['mail_siege']; ?></td>
                        <td><?php echo $club['adresse_courrier']; ?></td>
                        <td><?php echo $club['adr_cp_courrier']; ?></td>
                        <td><?php echo $club['adr_ville_courrier']; ?></td>
                        <td><?php echo $club['numero_prefecture']; ?></td>
                        <td><?php echo $controller->getNombreLicencies($club['numeroaffiliation']); ?></td>
                        <td>
                            <a href="visualiser_licencies.php?id=<?php echo $club['numeroaffiliation']; ?>" class="btn btn-primary">Visualiser</a>
                            <a href="modifier_clubs.php?id=<?php echo $club['numeroaffiliation']; ?>" class="btn btn-warning">Modifier</a>
                            <a href="supprimer_clubs.php?id=<?php echo $club['numeroaffiliation']; ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>