<?php
require_once (realpath(dirname(__FILE__) . '/../Controller/DAOConnect.php'));

class ClubsModel {
    private $db;

    public function __construct() {
        $this->db = DAOConnect::getInstance();
    }

    public function ajouterClubs($numAffiliation, $Designation, $adr_siege, $adr_cp_siege, $ville_siege, $Annee_affiliation, $Tel_clubs, $Mail_clubs, $adr_courrier, $adr_cp_courrier, $adr_ville_courrier, $Num_prefecture) {
        $numAffiliation = $this->db->real_escape_string($numAffiliation);
        $Designation = $this->db->real_escape_string($Designation);
        $adr_siege = $this->db->real_escape_string($adr_siege);
        $adr_cp_siege = $this->db->real_escape_string($adr_cp_siege);
        $ville_siege = $this->db->real_escape_string($ville_siege);
        $Annee_affiliation = $this->db->real_escape_string($Annee_affiliation);
        $Tel_clubs = $this->db->real_escape_string($Tel_clubs);
        $Mail_clubs = $this->db->real_escape_string($Mail_clubs);
        $adr_courrier = $this->db->real_escape_string($adr_courrier);
        $adr_cp_courrier = $this->db->real_escape_string($adr_cp_courrier);
        $adr_ville_courrier = $this->db->real_escape_string($adr_ville_courrier);
        $Num_prefecture = $this->db->real_escape_string($Num_prefecture);

        $sql = "INSERT INTO club (numeroaffiliation, designationclub, adresse_siege, adr_cp_siege, adr_ville_siege, annee_filiation, tel_siege, mail_siege, adresse_courrier, adr_cp_courrier, adr_ville_courrier, numero_prefecture) 
                VALUES ('$numAffiliation', '$Designation', '$adr_siege', '$adr_cp_siege', '$ville_siege', '$Annee_affiliation', '$Tel_clubs', '$Mail_clubs','$adr_courrier','$adr_cp_courrier','$adr_ville_courrier','$Num_prefecture')";

        $result = $this->db->query($sql);

        return $result;
    }

    public function getClubs() {
        $sql = "SELECT * FROM club";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getDesignation($id) {
        $sql = "SELECT designationclub FROM club WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['designationclub'];
    }
    public function getClubById($id) {
        $id = $this->db->real_escape_string($id);
        $sql = "SELECT * FROM club WHERE id = '$id'";
        $result = $this->db->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return array();
        }
    }
    

    
    
}
?>
