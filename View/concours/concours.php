<?php
require_once '../assets/header.php';
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
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Que souhaitez-vous faire ?</h2>
                <div class="mt-4">
                    <button onclick="loadContent('creation_concours.php')" class="btn btn-primary me-3">Créer un concours</button>
                    <button onclick="loadContent('visualiser_concours.php')" class="btn btn-secondary">Visualiser les concours</button>
                    <br><br>
                    <button onclick="loadContent('resultats_concours.php')" class="btn btn-warning">Résultat des concours</button>
                </div>
                <div id="content" class="mt-5">
                    <!-- Contenu chargé dynamiquement -->
                </div>
            </div>
        </div>
    </div>
    <script>
        function loadContent(url) {
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('content').innerHTML = data;
                })
                .catch(error => console.log('Erreur :', error));
        }
    </script>
</body>
</html>
