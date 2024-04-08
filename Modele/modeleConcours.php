<?php
require_once (realpath(dirname(__FILE__) . '/../Controller/DAOConnect.php'));

class ConcoursModel {
    private $db;

    public function __construct() {
        $this->db = DAOConnect::getInstance();
    }

    public function ajouterConcours($date, $club, $commentaire, $grillePoints, $nature, $niveau, $categorie) {
        $date = $this->db->real_escape_string($date);
        $club = $this->db->real_escape_string($club);
        $commentaire = $this->db->real_escape_string($commentaire);
        $grillePoints = $this->db->real_escape_string($grillePoints);
        $nature = $this->db->real_escape_string($nature);
        $niveau = $this->db->real_escape_string($niveau);
        $categorie = $this->db->real_escape_string($categorie);

        $sql = "INSERT INTO concours (date_concours, club_organisateur, commentaire, grille_points, nature, niveau, categorie) 
                VALUES ('$date', '$club', '$commentaire', '$grillePoints', '$nature', '$niveau', '$categorie')";

        $result = $this->db->query($sql);

        return $result;
    }

    public function getConcours() {
        $sql = "SELECT * FROM concours";
        $result = $this->db->query($sql);
        return $result;
    }

    public function modifierConcours($id, $date, $club, $grille_points, $nature, $niveau, $categorie) {
        $id = $this->db->real_escape_string($id);
        $date = $this->db->real_escape_string($date);
        $club = $this->db->real_escape_string($club);
        $grille_points = $this->db->real_escape_string($grille_points);
        $nature = $this->db->real_escape_string($nature);
        $niveau = $this->db->real_escape_string($niveau);
        $categorie = $this->db->real_escape_string($categorie);

        $sql = "UPDATE concours SET 
               date_concours = '$date', 
               club_organisateur = '$club', 
               grille_points = '$grille_points', 
               nature = '$nature', 
               niveau = '$niveau', 
               categorie = '$categorie' 
               WHERE id = '$id'";

        if ($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function getConcoursById($id) {
        $id = $this->db->real_escape_string($id);

        $sql = "SELECT * FROM concours WHERE id = '$id'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
?>
