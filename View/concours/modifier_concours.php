<?php
require_once(realpath(dirname(__FILE__) . '/../../Controller/controllerConcours.php'));

// Vérifie si l'ID du concours est spécifié dans l'URL
if (isset($_GET['id'])) {
    $controller = new ConcoursController();

    // Récupère les détails du concours à modifier
    $concoursModif = $controller->getConcoursById($_GET['id']);

    if ($concoursModif) {
        // Vérifie si le formulaire est soumis en POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupère les données du formulaire
            $data = [
                'id' => $_GET['id'],
                'date' => $_POST['date'],
                'club' => $_POST['club'],
                'grille_points' => $_POST['grille_points'],
                'nature' => $_POST['nature'],
                'niveau' => $_POST['niveau'],
                'categorie' => $_POST['categorie'],
                'nombre_equipes' => $_POST['nombre_equipes']
            ];
            
            $controller->modifierConcours($data);
            
            exit();
        }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un concours - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid mt-5">
    <h2 class="text-center mb-4">Modification du concours : <?php echo $concoursModif['club_organisateur']; ?></h2>
    <form action="modifier_concours.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="date" class="form-label">Date :</label>
                <input type="date" id="date" name="date" class="form-control" value="<?php echo $concoursModif['date_concours']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="club" class="form-label">Club organisateur :</label>
                <input type="text" id="club" name="club" class="form-control" value="<?php echo $concoursModif['club_organisateur']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="grille_points" class="form-label">Grille de points :</label>
                <select id="grille_points" name="grille_points" class="form-select" required>
                    <option value="B" <?php if ($concoursModif['grille_points'] === 'B') echo 'selected'; ?>>B</option>
                    <option value="C" <?php if ($concoursModif['grille_points'] === 'C') echo 'selected'; ?>>C</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="nature" class="form-label">Nature :</label>
                <select id="nature" name="nature" class="form-select" required>
                    <option value="formule" <?php if ($concoursModif['nature'] === 'formule') echo 'selected'; ?>>Formule</option>
                    <option value="individuel" <?php if ($concoursModif['nature'] === 'individuel') echo 'selected'; ?>>Individuel</option>
                    <option value="doublette" <?php if ($concoursModif['nature'] === 'doublette') echo 'selected'; ?>>Doublette</option>
                    <option value="triplette" <?php if ($concoursModif['nature'] === 'triplette') echo 'selected'; ?>>Triplette</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="niveau" class="form-label">Niveau :</label>
                <select id="niveau" name="niveau" class="form-select" required>
                    <option value="departemental" <?php if ($concoursModif['niveau'] === 'departemental') echo 'selected'; ?>>Départemental</option>
                    <option value="national" <?php if ($concoursModif['niveau'] === 'national') echo 'selected'; ?>>National</option>
                    <option value="international" <?php if ($concoursModif['niveau'] === 'international') echo 'selected'; ?>>International</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="categorie" class="form-label">Catégorie :</label>
                <select id="categorie" name="categorie" class="form-select" required>
                    <option value="senior" <?php if ($concoursModif['categorie'] === 'senior') echo 'selected'; ?>>Senior</option>
                    <option value="veteran" <?php if ($concoursModif['categorie'] === 'veteran') echo 'selected'; ?>>Vétéran</option>
                    <option value="feminin" <?php if ($concoursModif['categorie'] === 'feminin') echo 'selected'; ?>>Féminin</option>
                    <option value="junior" <?php if ($concoursModif['categorie'] === 'junior') echo 'selected'; ?>>Junior</option>
                    <option value="cadet" <?php if ($concoursModif['categorie'] === 'cadet') echo 'selected'; ?>>Cadet</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="nombre_equipes" class="form-label">Nombre d'équipes</label>
                    <input type="number" id="nombre_equipes" name="nombre_equipes" class="form-control" value="<?php echo $concoursModif['nombre_equipes']; ?>" required>   
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>Que souhaitez-vous faire ?</h2>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary mt-3">Valider</button>
                                <br><br>
                            </div>
                            <div id="content" class="mt-5">
                                <!-- Contenu chargé dynamiquement -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <a href="traitement.php?id_concours=<?php echo $_GET['id']; ?>" class="btn btn-warning">Saisir des résultats</a>

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
    