<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
require_once (realpath(dirname(__FILE__) . '/../view/assets/header.php'));
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Bienvenue, <?php echo $userInfo['prenom'] . ' ' . $userInfo['nom']; ?>, sur votre tableau de bord</h1>
        <p>Ceci est votre espace personnel où vous pouvez gérer vos données, etc.</p>
        <a href="deconnexion.php" class="btn btn-danger">Se déconnecter</a>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dernières actualités</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget felis nec metus aliquet placerat.
                        </p>
                        <a href="#" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Événements à venir</h5>
                        <p class="card-text">
                            Ut in nulla enim. Sed et risus quis nibh bibendum tristique.
                        </p>
                        <a href="#" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclure Bootstrap JS (facultatif, mais nécessaire pour certaines fonctionnalités Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>