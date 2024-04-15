<?php
require_once 'database.php';

if (!empty($_POST['numLicencie']) && !empty($_POST['nomLicencie']) ) {
    $numLicencie = $_POST['numLicencie'];
    $nomLicencie = $_POST['nomLicencie'];
    $prenomLicencie = $_POST['prenomLicencie'];
    $sexeLicencie = $_POST['sexeLicencie'];
    $datedenaissance = $_POST['datedenaissance'];
    $photoLicencie = $_POST['photoLicencie'];
    $categorieLicencie = $_POST['categorieLicencie'];
    $positionLicencie = $_POST['positionLicencie'];
    $adr_Licencie = $_POST['adr_Licencie'];
    $adr_ville_Licencie = $_POST['adr_ville_Licencie'];
    $tel_Licencie = $_POST['tel_Licencie'];
    $mail_Licencie = $_POST['mail_Licencie'];
    $nationalite_Licencie = $_POST['nationalite_Licencie'];
    $classification_Licencie = $_POST['classification_Licencie'];
    $validite_CM = $_POST['validite_CM'];
    $annee_reprise = $_POST['annee_reprise'];
    $premiere_licence = $_POST['premiere_licence'];
    $numeroaffiliation = $_POST['numeroaffiliation'];

    $conn = connectToDatabase();

    $sql = "UPDATE licencie SET nomLicencie = '$nomLicencie', prenomLicencie = '$prenomLicencie', sexeLicencie = '$sexeLicencie', datedenaissance = '$datedenaissance', photoLicencie = '$photoLicencie', categorieLicencie = '$categorieLicencie', positionLicencie = '$positionLicencie', adr_Licencie = '$adr_Licencie', adr_ville_Licencie = '$adr_ville_Licencie', tel_Licencie = '$tel_Licencie', mail_Licencie = '$mail_Licencie', nationalite_Licencie = '$nationalite_Licencie', classification_Licencie = '$classification_Licencie', validite_CM = '$validite_CM', annee_reprise = '$annee_reprise', premiere_licence = '$premiere_licence', numeroaffiliation = '$numeroaffiliation' WHERE numLicencie = '$numLicencie'";

    if ($conn->query($sql) === TRUE) {
        echo "Mise à jour effectuée avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Erreur : les champs ne doivent pas être vides";
    //var_dump($_POST);
    var_dump ( $_POST['numLicencie']) ;
    //echo $_POST['nomLicencie'];
}