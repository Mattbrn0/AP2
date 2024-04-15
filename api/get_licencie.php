<?php
require 'database.php';

// get licencie by numLicencie

if (!empty($_POST['numLicencie'])) {
    $numLicencie = $_POST['numLicencie'];

    $conn = connectToDatabase();

    $sql = "SELECT * FROM licencie WHERE numLicencie = '$numLicencie'";

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