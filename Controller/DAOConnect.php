<?php
class DAOConnect {
    private static $mysqli;

    public static function getInstance() {
        if (!isset(self::$mysqli)) {
            // Paramètres de connexion à la base de données
            $hostname = 'localhost';
            $username = 'root';
            $password = 'mat29pau08';
            $database = 'ap_ffbsq';

            // Connexion à la base de données
            self::$mysqli = new mysqli($hostname, $username, $password, $database);

            // Vérification de la connexion
            if (self::$mysqli->connect_error) {
                die("Échec de la connexion à la base de données : " . self::$mysqli->connect_error);
            }

            // Définir le jeu de caractères de la connexion
            self::$mysqli->set_charset("utf8");
        }
        return self::$mysqli;
    }
}
?>
