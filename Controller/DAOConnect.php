<?php
class DAOConnect {
    private static $mysqli;
    private static $hostname = 'localhost';
    private static $username = 'root';
    private static $password = 'mat29pau08';
    private static $database = 'ap_ffbsq1';

    public static function getInstance() {
        if (!isset(self::$mysqli)) {
            // Connexion à la base de données
            self::$mysqli = new mysqli(self::$hostname, self::$username, self::$password, self::$database);

            // Vérification de la connexion
            if (self::$mysqli->connect_error) {
                die("Échec de la connexion à la base de données : " . self::$mysqli->connect_error);
            }

            // Définir le jeu de caractères de la connexion
            self::$mysqli->set_charset("utf8");

            // Exécuter la sauvegarde de la base de données
           // self::backupDatabase();
        }

        return self::$mysqli;
    }

    /*private static function backupDatabase() {
        // Chemin du fichier de sauvegarde
        $backupFile = 'C:/Users/verb1/Desktop/ffbsq/Controller/' . self::$database . '-' . date("Y-m-d-H-i-s") . '.sql';

        // Commande de sauvegarde
        $command = "mysqldump --opt -h " . self::$hostname . " -u " . self::$username . " -p" . self::$password . " " . self::$database . " > $backupFile";

        // Exécuter la commande de sauvegarde
        system($command);

        // Vérifier si la sauvegarde a réussi
        if (file_exists($backupFile)) {
            echo "Sauvegarde de la base de données réussie. Chemin du fichier : $backupFile";
        } else {
            echo "Échec de la sauvegarde de la base de données.";
        }
    }
    */
}
?>