<?php
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerConcours.php'));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ConcoursController();
    $controller->ajouterConcours();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un concours - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2 class="text-center mb-4">Création d'un concours</h2>
    <div class="container-fluid mt-5">
    <form action="creation_concours.php" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="date" class="form-label">Date :</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="club" class="form-label">CLUB organisateur :</label>
                    <input type="text" id="club" name="club" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="grille_points" class="form-label">Grille de points :</label>
                    <select id="grille_points" name="grille_points" class="form-select" required>
                        <option value="C">C</option>
                        <option value="B">B</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="niveau" class="form-label">Niveau :</label>
                    <select id="niveau" name="niveau" class="form-select" required>
                        <option value="departemental">Départemental</option>
                        <option value="national">National</option>
                        <option value="international">International</option>
                        <!-- Autres options de niveau -->
                    </select>
                </div>
                <div class="col-12">
                    <label for="commentaire" class="form-label">Commentaire :</label>
                    <textarea id="commentaire" name="commentaire" class="form-control" rows="3"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="nature" class="form-label">Nature :</label>
                    <select id="nature" name="nature" class="form-select" required>
                        <option value="formule">Formule</option>
                        <option value="individuel">Individuel</option>
                        <option value="doublette">Doublette</option>
                        <option value="triplette">Triplette</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="categorie" class="form-label">Catégorie :</label>
                    <select id="categorie" name="categorie" class="form-select" required>
                        <option value="senior">Senior</option>
                        <option value="veteran">Vétéran</option>
                        <option value="feminin">Feminin</option>
                        <option value="junior">Junior</option>
                        <option value="cadet">Cadet</option>
                        <option value="minime">Minime</option>
                        <option value="mixte">Mixte</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
