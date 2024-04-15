<?php
require_once 'database.php';

if (!empty($_POST['numLicencie']) && !empty($_POST['nomLicencie'])) {
    $numLicencie = $_POST['numLicencie'];
    $nomLicencie = $_POST['nomLicencie'];

    $conn = connectToDatabase();

    $sql = "INSERT INTO licencie (numLicencie, nomLicencie) VALUES ('$numLicencie', '$nomLicencie')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouveau licencié créé avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Erreur : les champs ne doivent pas être vides";
}
?>