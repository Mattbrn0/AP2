<?php
// Inclure la bibliothèque PHP QR Code
require_once (realpath(dirname(__FILE__) . '/../../Dependecies/phpqrcode/qrlib.php'));
require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerLicences.php'));


// Vérifier si l'ID du licencié est fourni dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'ID du licencié depuis l'URL
    $idLicencie = $_GET['id'];

    // Instancier le contrôleur des licences
    $controller = new LicencesController();

    // Récupérer les informations du licencié
    $licencie = $controller->getLicencieById($idLicencie);

    // Vérifier si le licencié existe
    if($licencie) {
        // Générer le contenu du QR code avec les données du licencié
        $contenuQR = "Numéro licence: " . $licencie['numlicencie'] . "\n" .
                     "Nom: " . $licencie['nomlicencie'] . "\n" .
                     "Prénom: " . $licencie['prenomlicencie'];

        // Chemin où sauvegarder le QR code généré
        $cheminQR = 'C:/Users/verb1/Desktop/ffbsq/assets/qrcode/';

        // Nom du fichier QR code (numéro de licence du licencié)
        $nomFichierQR = $licencie['numlicencie'] . "-" . $licencie['nomlicencie'] . "-" . $licencie['prenomlicencie'] . ".png";

        // Chemin complet du fichier QR code
        $cheminFichierQR = $cheminQR . $nomFichierQR;

        // Générer le QR code et le sauvegarder dans le dossier spécifié
        QRcode::png($contenuQR, $cheminFichierQR);

        // Afficher le QR code généré
        echo '<img src="' . $cheminFichierQR . '" alt="QR Code">';
    } else {
        // Afficher un message si le licencié n'est pas trouvé
        echo "Licencié non trouvé.";
    }
} else {
    // Afficher un message si l'ID du licencié n'est pas fourni dans l'URL
    echo "ID du licencié non fourni.";
}
?>