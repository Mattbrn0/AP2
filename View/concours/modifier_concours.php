<?php
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerConcours.php'));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ConcoursController();
    $controller->modifierConcours();
}

if(isset($_GET['id'])) {

    $controller = new ConcoursController();

    $concoursModif = $controller->getConcoursById($_GET['id']);

    if($concoursModif) {
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier d'un concours - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2 class="text-center mb-4">Modification du concours : <?php echo $concoursModif['club_organisateur'];?></h2>
    <div class="container-fluid mt-5">
    <form action="modifier_concours.php" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="date" class="form-label">Date :</label>
                    <input type="date" id="date" name="date" class="form-control" value="<?php echo $concoursModif['date_concours']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="club" class="form-label">CLUB organisateur :</label>
                    <input type="text" id="club" name="club" class="form-control" value="<?php echo $concoursModif['club_organisateur']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="grille_points" class="form-label">Grille de points :</label>
                    <select id="grille_points" name="grille_points" class="form-select" value="<?php echo $concoursModif['grille_points']; ?>" required>
                    <option value="B">B</option>
                    <option value="C">C</option>
                        
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="nature" class="form-label">Nature :</label>
                    <select id="nature" name="nature" class="form-select" value="<?php echo $concoursModif['nature']; ?>" required>
                        <option value="formule">Formule</option>
                        <option value="individuel">Individuel</option>
                        <option value="doublette">Doublette</option>
                        <option value="triplette">Triplette</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="niveau" class="form-label">Niveau :</label>
                    <select id="niveau" name="niveau" class="form-select" value="<?php echo $concoursModif['niveau']; ?>" required>
                        <option value="departemental">Départemental</option>
                        <option value="national">National</option>
                        <option value="international">International</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="categorie" class="form-label">Catégorie :</label>
                    <select id="categorie" name="categorie" class="form-select" required value="<?php echo $concoursModif['categorie']; ?>">
                        <option value="senior">Senior</option>
                        <option value="veteran">Vétéran</option>
                        <option value="feminin">Feminin</option>
                        <option value="junior">Junior</option>
                        <option value="cadet">Cadet</option>
                        <option value="minime">Minime</option>
                        <option value="mixte">Mixte</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="nombre_equipes" class="form-label">Nombre d'équipes</label>
                    <input type="number" id="nombre_equipes" name="nombre_equipes" class="form-control" values="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>Que souhaitez-vous faire ?</h2>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary w-100 mt-3">Valider</button>
                                <br><br>
                                <button onclick="loadContent('resultats_concours.php')" class="btn btn-warning">saisir un résultat</button>
                            </div>
                            <div id="content" class="mt-5">
                                <!-- Contenu chargé dynamiquement -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
<?php
 } else {
    echo "concours non trouvé.";
}
} else {
echo "ID du concours non fourni.";
}
?>

</head>
</body>
    