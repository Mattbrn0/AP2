<?php
function connectToDatabase() {
    $conn = mysqli_connect("localhost", "root", "", "AP_FFBSQ2");
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    } else {
        $conn->set_charset("utf8");
    }

    return $conn;
}