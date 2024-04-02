<?php

require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerConcours.php'));

$controller = new ConcoursController();

$concours = $controller->getConcours();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualiser les concours - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-4">Liste des concours</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Club organisateur</th>
                    <th scope="col">Grille de points</th>
                    <th scope="col">Niveau</th>
                    <th scope="col">Nature</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Modification</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($concours as $concour) : ?>
                    <tr>
                        <td><?php echo $concour['date_concours']; ?></td>
                        <td><?php echo $concour['club_organisateur']; ?></td>
                        <td><?php echo $concour['grille_points']; ?></td>
                        <td><?php echo $concour['niveau']; ?></td>
                        <td><?php echo $concour['nature']; ?></td>
                        <td><?php echo $concour['categorie']; ?></td>
                        <td><button onclick="loadContent('modifier_concours.php?id=<?php echo $concour['id']; ?>')" class="btn btn-primary">Modifier</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>