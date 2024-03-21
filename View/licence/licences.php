<?php
require_once (realpath(dirname(__FILE__) . '/../assets/header.php'));
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
<div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Que souhaitez-vous faire ?</h2>
                <div class="mt-4">
                    <button onclick="loadContent('creation_licence.php')" class="btn btn-primary me-3">Création nouveau licencié</button>
                    <button onclick="loadContent('licences_visualisation.php')" class="btn btn-secondary">Visualiser les licenciés</button>
                <br><br>
                    <button onclick="loadContent('mutation_inter_licence.php')" class="btn btn-warning">Mutation Inter Comités</button>
                <div id="content" class="mt-5">
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