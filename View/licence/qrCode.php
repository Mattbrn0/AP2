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
        // Créer un tableau associatif avec les données du licencié
        $data = array(
            'numero_licence' => $licencie['numlicencie'],
            'nom' => $licencie['nomlicencie'],
            'prenom' => $licencie['prenomlicencie'],
            'sexe' => $licencie['sexelicencie'],
            'date_naissance' => $licencie['datedenaissance'],
            'categorie' => $licencie['categorielicencie'],
            'position' => $licencie['positionlicencie'],
            'adresse' => $licencie['adr_licencie'],
            'ville' => $licencie['adr_ville_licencie'],
            'telephone' => $licencie['tel_licencie'],
            'email' => $licencie['mail_licencie'],
            'nationalite' => $licencie['nationalite_licencie'],
            'classification' => $licencie['classification_licencie'],
            'validite_CM' => $licencie['validite_CM'],
            'annee_reprise' => $licencie['annee_reprise'],
            'premiere_licence' => $licencie['premiere_licence'],
            'club' => $licencie['numeroaffiliation']

        );

        // Convertir le tableau en JSON
        $jsonData = json_encode($data);

        // Chemin où sauvegarder le QR code généré
        $cheminQR = '../../assets/qrcode/';

        // Nom du fichier QR code (numéro de licence du licencié)
        $nomFichierQR = $licencie['numlicencie'] . "-" . $licencie['nomlicencie'] . "-" . $licencie['prenomlicencie'] . ".png";

        // Chemin complet du fichier QR code
        $cheminFichierQR = $cheminQR . $nomFichierQR;

        // Générer le QR code avec les données JSON et le sauvegarder dans le dossier spécifié
        QRcode::png($jsonData, $cheminFichierQR);

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
