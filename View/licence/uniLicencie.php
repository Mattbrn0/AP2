<?php
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerLicences.php'));

// Vérifie si l'ID du licencié est présent dans les données GET
if(isset($_GET['id'])) {

    $controller = new LicencesController();

    $licencie = $controller->getLicencieById($_GET['id']);

    if($licencie) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'id' => $_GET['id'],
                'nomlicencie' => $_POST['LicenceNom'],
                'prenomlicencie' => $_POST['LicencePrenom'],
                'sexelicencie' => $_POST['LicenceSexe'],
                'datedenaissance' => $_POST['LicenceDateDeNaissance'],
                'categorielicencie' => $_POST['LicenceCategorie'],
                'positionlicencie' => $_POST['LicencePosition'],
                'adr_licencie' => $_POST['LicenceAdresse'],
                'adr_ville_licencie' => $_POST['LicenceVille'],
                'tel_licencie' => $_POST['LicenceTelephone'],
                'mail_licencie' => $_POST['LicenceEmail'],
                'nationalite_licencie' => $_POST['LicenceNationalite'],
                'classification_licencie' => $_POST['LicenceClassification'],
                'validite_CM' => $_POST['LicenceCM'],
                'annee_reprise' => $_POST['AnneeReprise'],
                'premiere_licence' => $_POST['LicencePremiere'],
                'numeroaffiliation' => $_POST['numeroaffiliation'],
                'club_licence' => $_POST['LicenceClub']
            ];
            $controller->updateLicencie($data);

            header('Location: ../view/page_success.php');
            exit();
        }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le licencié - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Visualisation de la licence de <?php echo $licencie['nomlicencie'] . ' ' . $licencie['prenomlicencie']; ?></h2>
        <form action="uniLicencie.php" method="POST">
            <input type="hidden" name="idLicencie" value="<?php echo $licencie['numlicencie']; ?>">
            <div class="mb-3">
                <label for="LicenceNom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="LicenceNom" name="LicenceNom" value="<?php echo $licencie['nomlicencie']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicencePrenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="LicencePrenom" name="LicencePrenom" value="<?php echo $licencie['prenomlicencie']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicenceSexe" class="form-label">Sexe</label>
                <select class="form-select" id="LicenceSexe" name="LicenceSexe">
                    <option value="M" <?php if($licencie['sexelicencie'] == 'M') { echo 'selected'; } ?>>Masculin</option>
                    <option value="F" <?php if($licencie['sexelicencie'] == 'F') { echo 'selected'; } ?>>Féminin</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="LicenceDateDeNaissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="LicenceDateDeNaissance" name="LicenceDateDeNaissance" value="<?php echo $licencie['datedenaissance']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicenceCategorie" class="form-label">Catégorie</label>
                <input type="text" class="form-control" id="LicenceCategorie" name="LicenceCategorie" value="<?php echo $licencie['categorielicencie']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicencePosition" class="form-label">Position</label>
                <input type="text" class="form-control" id="LicencePosition" name="LicencePosition" value="<?php echo $licencie['positionlicencie']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicenceAdresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="LicenceAdresse" name="LicenceAdresse" value="<?php echo $licencie['adr_licencie']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicenceVille" class="form-label">Ville</label>
                <input type="text" class="form-control" id="LicenceVille" name="LicenceVille" value="<?php echo $licencie['adr_ville_licencie']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicenceTelephone" class="form-label">Téléphone</label>
                <input type="tel" class="form-control" id="LicenceTelephone" name="LicenceTelephone" value="<?php echo $licencie['tel_licencie']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicenceEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="LicenceEmail" name="LicenceEmail" value="<?php echo $licencie['mail_licencie']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicenceNationalite" class="form-label">Nationalité</label>
                <input type="text" class="form-control" id="LicenceNationalite" name="LicenceNationalite" value="<?php echo $licencie['nationalite_licencie']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicenceClassification" class="form-label">Classification</label>
                <input type="text" class="form-control" id="LicenceClassification" name="LicenceClassification" value="<?php echo $licencie['classification_licencie']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicenceCM" class="form-label">Validité CM</label>
                <input type="date" class="form-control" id="LicenceCM" name="LicenceCM" value="<?php echo $licencie['validite_CM']; ?>">
            </div>
            <div class="mb-3">
                <label for="AnneeReprise" class="form-label">Année de reprise</label>
                <input type="text" class="form-control" id="AnneeReprise" name="AnneeReprise" value="<?php echo $licencie['annee_reprise']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicencePremiere" class="form-label">Première licence</label>
                <input type="date" class="form-control" id="LicencePremiere" name="LicencePremiere" value="<?php echo $licencie['premiere_licence']; ?>">
            </div>
            <div class="mb-3">
                <label for="LicenceClub" class="form-label">Club</label>
                <select class="form-select" id="LicenceClub" name="LicenceClub">
                    <?php
                    $clubs = $controller->getClubs();
                    while($club = $clubs->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $club['numeroaffiliation']; ?>" <?php if($licencie['numeroaffiliation'] == $club['numeroaffiliation']) { echo 'selected'; } ?>><?php echo $club['designationclub']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
<?php
    } else {
        echo "Licencié non trouvé.";
    }
} else {
    echo "ID du licencié non fourni.";
}
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si l'ID du licencié est présent dans les données POST
    if(isset($_POST['idLicencie'])) {
        $idLicencie = $_POST['idLicencie'];

        // Crée une instance du contrôleur LicencesController
        $controller = new LicencesController();

        // Met à jour les informations du licencié
        $result = $controller->updateLicencie($_POST);

        if($result) {
            // Redirection vers une page de succès
            header("Location: /view/licence/licences.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour des informations du licencié.";
        }
    } else {
        echo "ID du licencié non fourni.";
    }
}
?>