<?php
require_once '../assets/header.php';
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerConcours.php'));
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerLicences.php'));



$id_concours = $_GET['id_concours'];


$controller = new ConcoursController();
$concours = $controller->getConcoursById($id_concours);

$nb_finalistes = 2; 
$nb_vainqueurs = 2;

if($concours){


if ($concours['nature'] === 'doublette') {
    $nb_finalistes = 2;
    $nb_vainqueurs = 2;
    $nb_demis_finalistes = 2;
} elseif ($concours['nature'] === 'triplette') {
    $nb_finalistes = 3;
    $nb_vainqueurs = 3;
    $nb_demis_finalistes = 3;
} elseif ($concours['nature'] === 'individuel') {
    $nb_finalistes = 1;
    $nb_vainqueurs = 1;
    $nb_demis_finalistes = 1;
}




// Déterminez les points en fonction de la grille de points B ou C
$grille_points = $concours['grille_points'];
$points_gagnant = 0;
$points_finaliste = 0;
$points_demi_finaliste = 0;

if ($grille_points === 'B') {
    if ($concours['nombre_equipes'] > 64) {
        $points_gagnant = 8;
        $points_finaliste = 6;
        $points_demi_finaliste = 4;
    } elseif ($concours['nombre_equipes'] > 32) {
        $points_gagnant = 6;
        $points_finaliste = 4;
        $points_demi_finaliste = 2;
    } elseif ($concours['nombre_equipes'] > 16) {
        $points_gagnant = 4;
        $points_finaliste = 3;
    } else {
        $points_gagnant = 2;
        $points_finaliste = 1;
    }
} elseif ($grille_points === 'C') {
    if ($concours['nombre_equipes'] > 64) {
        $points_gagnant = 5;
        $points_finaliste = 4;
        $points_demi_finaliste = 3;
    } elseif ($concours['nombre_equipes'] > 32) {
        $points_gagnant = 4;
        $points_finaliste = 3;
        $points_demi_finaliste = 2;
    } elseif ($concours['nombre_equipes'] > 16) {
        $points_gagnant = 3;
        $points_finaliste = 2;
    } else {
        $points_gagnant = 2;
        $points_finaliste = 1;
    }
}

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vainqueurs = $_POST['vainqueurs'];
    $points_vainqueurs = $_POST['points_vainqueurs'];
    $finalistes = $_POST['finalistes'];
    $points_finalistes = $_POST['points_finalistes'];

    foreach ($vainqueurs as $key => $vainqueur) {
        $controller->saveResult($id_concours, $vainqueur, $concours['nature'], 'gagnant', $points_vainqueurs[$key]);
    }

    foreach ($finalistes as $key => $finaliste) {
        $controller->saveResult($id_concours, $finaliste, $concours['nature'], 'finaliste', $points_finalistes[$key]);
    }

    if ($concours['nombre_equipes'] > 32) {
        $demi_finalistes = $_POST['demi_finalistes'];
        $points_demi_finalistes = $_POST['points_demi_finalistes'];

        foreach ($demi_finalistes as $key => $demi_finaliste) {
            $controller->saveResult($id_concours, $demi_finaliste, $concours['nature'], 'demi-finaliste', $points_demi_finalistes[$key]);
        }
    }


    header('Location: autre_page.php');
    exit;

}


    $licencies = $controller->getLicenciesByConcours($id_concours);

    // Recupération des informations des licenciés grace à leur id
    $controllerLicencie = new LicencesController();
    foreach ($licencies as $key => $licencie) {
        $licencies[$key] = $controllerLicencie->getLicencieById($licencie['id_licencie']);
    }

    // recuperation du nombre_points pour chaque licencié
    // Récupération du nombre de points pour chaque licencié
foreach ($licencies as $key => $licencie) {
    $points_licencie = $controller->getNombrePoints($id_concours, $licencie['numlicencie']);
    if ($points_licencie !== false) {
        $licencies[$key]['nombre_points'] = $points_licencie['nombre_points'];
    } else {
        $licencies[$key]['nombre_points'] = 0; // Définir un nombre de points par défaut si aucun résultat n'est trouvé
    }
}




?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Saisie des résultats</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Saisie des résultats du concours n°<?php echo $id_concours; ?></h1>
            <table class="table">
            <thead>
            <tr>
                <th>N° Licencié</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Club</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($licencies as $licencie) : ?>
                <tr>
                    <td><?php echo $licencie['numlicencie']; ?></td>
                    <!-- Afficher le nom du licencié avec le foreach qu'on a fait plus haut -->
                    <td><?php echo $licencie['nomlicencie']; ?></td>
                    <td><?php echo $licencie['prenomlicencie']; ?></td>
                    <td><?php echo $licencie['numeroaffiliation']; ?></td>   
                    <td><?php echo isset($licencie['nombre_points']) ? $licencie['nombre_points'] : ''; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
            <form action="" method="POST">
                <h2>Vainqueurs</h2>
                <?php for ($i = 1; $i <= $nb_vainqueurs; $i++): ?>
                    <div>
                        <label for="vainqueur_<?php echo $i; ?>">Vainqueur <?php echo $i; ?> :</label>
                        <input type="text" name="vainqueurs[]" id="vainqueur_<?php echo $i; ?>" required>
                        <label for="points_vainqueur_<?php echo $i; ?>">Points :</label>
                        <input type="number" name="points_vainqueurs[]" id="points_vainqueur_<?php echo $i; ?>" value="<?php echo $points_gagnant; ?>" readonly>
                    </div>
                <?php endfor; ?>

                <h2>Finalistes</h2>
                <?php for ($i = 1; $i <= $nb_finalistes; $i++): ?>
                    <div>
                        <label for="finaliste_<?php echo $i; ?>">Finaliste <?php echo $i; ?> :</label>
                        <input type="text" name="finalistes[]" id="finaliste_<?php echo $i; ?>" required>
                        <label for="points_finaliste_<?php echo $i; ?>">Points :</label>
                        <input type="number" name="points_finalistes[]" id="points_finaliste_<?php echo $i; ?>" value="<?php echo $points_finaliste; ?>" readonly>
                    </div>
                <?php endfor; ?>

                <?php if ($concours['nombre_equipes'] > 32): ?>
                    <h2>Demi-finalistes</h2>
                    <?php for ($i = 1; $i <= $nb_demis_finalistes; $i++): ?>
                        <div>
                            <label for="demi_finaliste_<?php echo $i; ?>">Demi-finaliste <?php echo $i; ?> :</label>
                            <input type="text" name="demi_finalistes[]" id="demi_finaliste_<?php echo $i; ?>" required>
                            <label for="points_demi_finaliste_<?php echo $i; ?>">Points :</label>
                            <input type="number" name="points_demi_finalistes[]" id="points_demi_finaliste_<?php echo $i; ?>" value="<?php echo $points_demi_finaliste; ?>" readonly>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
<br>
                <button class="btn btn-warning" type="submit">Enregistrer les résultats</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
} else 
{
    echo "<div class='container'>
    <div class='row'>
        <div class='col-12 text-center'>";
    echo "<div class='alert alert-danger'>Aucun concours trouvé</div>";
    echo "retourner à la liste des concours <a href='concours.php'>ici</a>";
}