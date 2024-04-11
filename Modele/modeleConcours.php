<?php
require_once (realpath(dirname(__FILE__) . '/../Controller/DAOConnect.php'));

class ConcoursModel {
    private $db;

    public function __construct() {
        $this->db = DAOConnect::getInstance();
    }

    public function ajouterConcours($date, $club, $commentaire, $grillePoints, $nature, $niveau, $categorie, $nombre_equipes) {
        $date = $this->db->real_escape_string($date);
        $club = $this->db->real_escape_string($club);
        $commentaire = $this->db->real_escape_string($commentaire);
        $grillePoints = $this->db->real_escape_string($grillePoints);
        $nature = $this->db->real_escape_string($nature);
        $niveau = $this->db->real_escape_string($niveau);
        $categorie = $this->db->real_escape_string($categorie);
        $nombre_equipes = $this->db->real_escape_string($nombre_equipes);

        $sql = "INSERT INTO concours (date_concours, club_organisateur, commentaire, grille_points, nature, niveau, categorie, nombre_equipes) 
                VALUES ('$date', '$club', '$commentaire', '$grillePoints', '$nature', '$niveau', '$categorie', '$nombre_equipes')";

        $result = $this->db->query($sql);

        return $result;
    }

    public function getConcours() {
        $sql = "SELECT * FROM concours";
        $result = $this->db->query($sql);
        return $result;
    }

    public function modifierConcours($id, $date, $club, $grille_points, $nature, $niveau, $categorie, $nombre_equipes) {
        $id = $this->db->real_escape_string($id);
        $date = $this->db->real_escape_string($date);
        $club = $this->db->real_escape_string($club);
        $grille_points = $this->db->real_escape_string($grille_points);
        $nature = $this->db->real_escape_string($nature);
        $niveau = $this->db->real_escape_string($niveau);
        $categorie = $this->db->real_escape_string($categorie);
        $nombre_equipes = $this->db->real_escape_string($nombre_equipes);

        $sql = "UPDATE concours SET 
               date_concours = '$date', 
               club_organisateur = '$club', 
               grille_points = '$grille_points', 
               nature = '$nature', 
               niveau = '$niveau', 
               categorie = '$categorie',
               nombre_equipes = '$nombre_equipes'
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

    public function getResultatsConcours($concoursId) {
        $concoursId = $this->db->real_escape_string($concoursId);
    
        $sql = "SELECT * FROM resultat WHERE id_concours = '$concoursId'";
        $result = $this->db->query($sql);
    
        $vainqueurs = [];
        $finalistes = [];
    
        while ($row = $result->fetch_assoc()) {
            if ($row['gagnant'] != null) {
                $vainqueurDetails = $this->getParticipantDetails($row['gagnant']);
                if ($vainqueurDetails !== null) {
                    $vainqueurs[] = $vainqueurDetails;
                }
            }
    
            if ($row['finaliste'] != null) {
                $finalisteDetails = $this->getParticipantDetails($row['finaliste']);
                if ($finalisteDetails !== null) {
                    $finalistes[] = $finalisteDetails;
                }
            }
        }
    
        return ['vainqueurs' => $vainqueurs, 'finalistes' => $finalistes];
    }
    
    
    private function getParticipantDetails($participantId) {
        $participantId = $this->db->real_escape_string($participantId);
    
        $sql = "SELECT * FROM licencie WHERE numlicencie = '$participantId'";
        $result = $this->db->query($sql);
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    
    

    function calculerPoints($categorie, $nombre_equipes, $position) {
        if ($categorie == "B") {
            if ($nombre_equipes > 64) {
                if ($position == "gagnant") {
                    return 8;
                } elseif ($position == "finaliste") {
                    return 6;
                } elseif ($position == "demi-finalistes") {
                    return 4;
                }
            } elseif ($nombre_equipes > 32) {
                if ($position == "gagnant") {
                    return 6;
                } elseif ($position == "finaliste") {
                    return 4;
                } elseif ($position == "demi-finalistes") {
                    return 2;
                }
            } elseif ($nombre_equipes > 16) {
                if ($position == "gagnant") {
                    return 4;
                } elseif ($position == "finaliste") {
                    return 3;
                }
            } else {
                if ($position == "gagnant") {
                    return 2;
                } elseif ($position == "finaliste") {
                    return 1;
                }
            }
        } elseif ($categorie == "C") {
            if ($nombre_equipes > 64) {
                if ($position == "gagnant") {
                    return 5;
                } elseif ($position == "finaliste") {
                    return 4;
                } elseif ($position == "demi-finalistes") {
                    return 3;
                }
            } elseif ($nombre_equipes > 32) {
                if ($position == "gagnant") {
                    return 4;
                } elseif ($position == "finaliste") {
                    return 3;
                } elseif ($position == "demi-finalistes") {
                    return 2;
                }
            } elseif ($nombre_equipes > 16) {
                if ($position == "gagnant") {
                    return 3;
                } elseif ($position == "finaliste") {
                    return 2;
                }
            } else {
                if ($position == "gagnant") {
                    return 2;
                } elseif ($position == "finaliste") {
                    return 1;
                }
            }
        }
    
        return 0; // Valeur par défaut si aucun cas ne correspond
    }
    
}
?>