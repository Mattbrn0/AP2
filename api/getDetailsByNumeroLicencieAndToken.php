<?php

require 'database.php';

if (!empty($_POST['numLicencie']) && !empty($_POST['token']) ) {
    $numLicencie = $_POST['numLicencie'];
    $token = $_POST['token'];

    $conn = connectToDatabase();

    $sql = "SELECT * FROM licencie WHERE numLicencie = '$numLicencie' AND token = '$token'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Erreur : les champs ne doivent pas être vides";
}

?>