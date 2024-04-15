<?php
// URL de l'API
$url = 'http://ap_ffbsq1.local/api/update_licencie.php';

// Données à envoyer à l'API
$data = array(
    'numLicencie' => '1',
    'nomLicencie' => 'Doe',
    'prenomLicencie' => 'John',
    'sexeLicencie' => 'M',
    'datedenaissance' => '1990-01-01',
    'photoLicencie' => 'photo.jpg',
    'categorieLicencie' => 'Senior',
    'positionLicencie' => 'Attaquant',
    'adr_Licencie' => '1 rue de la Paix',
    'adr_ville_Licencie' => 'Paris',
    'tel_Licencie' => '0102030405',
    'mail_Licencie' => 'edddd@hotmail.fr',
    'nationalite_Licencie' => 'Française',
    'classification_Licencie' => 'Nationale 1',
    'validite_CM' => '2021-01-01',
    'annee_reprise' => '2020',
    'premiere_licence' => '2010',
    'numeroaffiliation' => '2'
);

// Configuration de la requête
$options = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => http_build_query($data)
    )
);

// Création du contexte de la requête
$context = stream_context_create($options);

// Envoi de la requête à l'API
$response = file_get_contents($url, false, $context);

// Affichage de la réponse de l'API
echo $response;
?>