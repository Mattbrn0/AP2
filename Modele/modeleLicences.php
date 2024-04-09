<?php
require_once (realpath(dirname(__FILE__) . '/../Controller/DAOConnect.php'));

class LicencesModel {
    private $db;

    public function __construct() {
        $this->db = DAOConnect::getInstance();
    }

    public function ajouterLicence($numLicencie, $nomlicencie) {
        $numLicencie = $this->db->real_escape_string($numLicencie);
        $nomlicencie = $this->db->real_escape_string($nomlicencie);

        $sql = "INSERT INTO licencie (numLicencie, nomlicencie) 
                VALUES ('$numLicencie', '$nomlicencie')";

        $result = $this->db->query($sql);

        return $result;
    }

    public function changerClubLicence($numLicencie, $numeroaffiliation) {
        $numLicencie = $this->db->real_escape_string($numLicencie);
        $numeroaffiliation = $this->db->real_escape_string($numeroaffiliation);

        $sql = "UPDATE licencie SET numeroaffiliation = '$numeroaffiliation' WHERE numLicencie = '$numLicencie'";

        $result = $this->db->query($sql);

        return $result;
    }

    public function getClubs() {
        $sql = "SELECT * FROM club";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getLicencie() {
        $sql = "SELECT * FROM licencie";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getLicencieById($id) {
        $id = $this->db->real_escape_string($id);

        $sql = "SELECT * FROM licencie WHERE numLicencie = '$id'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function updateLicencie($idLicencie, $nom, $prenom, $sexe, $dateNaissance, $categorie, $position, $adresse, $ville, $telephone, $email, $nationalite, $classification, $validiteCM, $anneeReprise, $premiereLicence, $club) {
        $idLicencie = $this->db->real_escape_string($idLicencie);
        $nom = $this->db->real_escape_string($nom);
        $prenom = $this->db->real_escape_string($prenom);
        $sexe = $this->db->real_escape_string($sexe);
        $dateNaissance = $this->db->real_escape_string($dateNaissance);
        $categorie = $this->db->real_escape_string($categorie);
        $position = $this->db->real_escape_string($position);
        $adresse = $this->db->real_escape_string($adresse);
        $ville = $this->db->real_escape_string($ville);
        $telephone = $this->db->real_escape_string($telephone);
        $email = $this->db->real_escape_string($email);
        $nationalite = $this->db->real_escape_string($nationalite);
        $classification = $this->db->real_escape_string($classification);
        $validiteCM = $this->db->real_escape_string($validiteCM);
        $anneeReprise = $this->db->real_escape_string($anneeReprise);
        $premiereLicence = !empty($premiereLicence) ? "'" . $this->db->real_escape_string($premiereLicence) . "'" : "NULL"; // Gestion de premiereLicence comme une date ou NULL
        $club = $this->db->real_escape_string($club);
    
        $sql = "UPDATE licencie SET 
                nomlicencie = '$nom',
                prenomlicencie = '$prenom',
                sexelicencie = '$sexe',
                datedenaissance = '$dateNaissance',
                categorielicencie = '$categorie',
                positionlicencie = '$position',
                adr_licencie = '$adresse',
                adr_ville_licencie = '$ville',
                tel_licencie = '$telephone',
                mail_licencie = '$email',
                nationalite_licencie = '$nationalite',
                classification_licencie = '$classification',
                validite_CM = '$validiteCM',
                annee_reprise = '$anneeReprise',
                premiere_licence = $premiereLicence,
                numeroaffiliation = '$club'
                WHERE numLicencie = '$idLicencie'";
    
        $result = $this->db->query($sql);
    
        return $result;
    }
    

    public function updateToken($idLicencie, $token) {
        $idLicencie = $this->db->real_escape_string($idLicencie);
        $token = $this->db->real_escape_string($token);

        $sql = "UPDATE licencie SET token = '$token' WHERE numLicencie = '$idLicencie'";
        $result = $this->db->query($sql);

        return $result;
    }

    public function getLicencieBySearch($nom, $prenom, $numlicencie) {
        $nom = $this->db->real_escape_string($nom);
        $prenom = $this->db->real_escape_string($prenom);
        $numlicencie = $this->db->real_escape_string($numlicencie);

        $sql = "SELECT * FROM licencie WHERE nomlicencie LIKE '%$nom%' AND prenomlicencie LIKE '%$prenom%' AND numLicencie LIKE '%$numlicencie%'";
        $result = $this->db->query($sql);

        $licences = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $licences[] = $row;
            }
        }

        return $licences;
    }
    
    
    
    
}