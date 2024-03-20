<?php

require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerClubs.php'));

$controller = new ClubsController();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    }

$clubs = [$controller->getClubById($id)]; 
$designation = $controller->getDesignation($id);
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
        <h2 class="text-center mb-4">Club <?php echo $designation; ?></h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Année de dernière affiliation</th>
                    <th scope="col">Adresse du siège</th>
                    <th scope="col">Envoi du courrier</th>
                    <th scope="col">Coordonnées</th>
                    <th scope="col">Numéro de préfecture</th>
                    <th scope="col">Nombre de licenciés</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clubs as $club) : ?>
                    <tr>
                        <td><?php echo $club['annee_filiation']; ?></td>
                        <td><?php echo $club['adresse_siege'] . "<br>" . $club['adr_ville_siege'] . "<br>" . $club['adr_cp_siege'];?></td>
                        <td><?php echo $club['adresse_courrier'] ."<br>" . $club['adr_ville_courrier'] . "<br>" . $club['adr_cp_courrier'];?></td>
                        <td><?php echo $club['mail_siege'] . "<br>" . $club['tel_siege']?></td>
                        <td><?php echo $club['numero_prefecture']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>