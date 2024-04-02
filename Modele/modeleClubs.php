<?php
require_once (realpath(dirname(__FILE__) . '/../Controller/DAOConnect.php'));

class ClubsModel {
    private $db;

    public function __construct() {
        $this->db = DAOConnect::getInstance();
    }

    public function ajouterClubs($numeroaffiliation, $designationclub, $adresse_siege, $adr_cp_siege, $adr_ville_siege, $annee_affiliation, $tel_siege, $mail_siege, $adresse_courrier, $adr_cp_courrier, $adr_ville_courrier, $numero_prefecture) {
        $numeroaffiliation = $this->db->real_escape_string($numeroaffiliation);
        $designationclub = $this->db->real_escape_string($designationclub);
        $adresse_siege = $this->db->real_escape_string($adresse_siege);
        $adr_cp_siege = $this->db->real_escape_string($adr_cp_siege);
        $adr_ville_siege = $this->db->real_escape_string($adr_ville_siege);
        $annee_affiliation = $this->db->real_escape_string($annee_affiliation);
        $tel_siege = $this->db->real_escape_string($tel_siege);
        $mail_siege = $this->db->real_escape_string($mail_siege);
        $adresse_courrier = $this->db->real_escape_string($adresse_courrier);
        $adr_cp_courrier = $this->db->real_escape_string($adr_cp_courrier);
        $adr_ville_courrier = $this->db->real_escape_string($adr_ville_courrier);
        $numero_prefecture = $this->db->real_escape_string($numero_prefecture);

        $sql = "INSERT INTO club (numeroaffiliation, designationclub, adresse_siege, adr_cp_siege, adr_ville_siege, annee_affiliation, tel_siege, mail_siege, adresse_courrier, adr_cp_courrier, adr_ville_courrier, numero_prefecture) 
                VALUES ('$numeroaffiliation', '$designationclub', '$adresse_siege', '$adr_cp_siege', '$adr_ville_siege', '$annee_affiliation', '$tel_siege', '$mail_siege', '$adresse_courrier', '$adr_cp_courrier', '$adr_ville_courrier', '$numero_prefecture')";

        $result = $this->db->query($sql);

        return $result;
    }

    public function getClubs() {
        $sql = "SELECT * FROM club";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getNombreLicencies($id) {
        $sql = "SELECT COUNT(*) FROM licencie WHERE numeroaffiliation = '$id'";
        $result = $this->db->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function getClubById($id) {
        $sql = "SELECT * FROM club WHERE numeroaffiliation = '$id'";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function getDesignation($id) {
        $sql = "SELECT designationclub FROM club WHERE numeroaffiliation = '$id'";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row['designationclub'];
    }
}
?>
