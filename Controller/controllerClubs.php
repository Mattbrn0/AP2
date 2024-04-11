<?php
require_once (realpath(dirname(__FILE__) . '/../Modele/modeleClubs.php'));

class ClubsController {
    public function ajouterClubs() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new ClubsModel();

            $result = $model->ajouterClubs(
                $_POST['numAffiliation'],
                $_POST['Designation'],
                $_POST['Adr_siege'],
                $_POST['Adr_cp_siege'],
                $_POST['Ville_siege'],
                $_POST['Annee_filiation'],
                $_POST['Tel_clubs'],
                $_POST['Mail_clubs'],
                $_POST['Adr_courrier'],
                $_POST['Adr_cp_courrier'],
                $_POST['Adr_ville_courrier'],
                $_POST['Num_prefecture']
            );

            if ($result) {
                header(realpath(__DIR__ . '/../../clubs/clubs.php'));
                exit();
            } else {
                echo "Erreur lors de l'insertion : " . $model->db->error;
            }
        }
    }

    public function getClubs() {
        $model = new ClubsModel();
        return $model->getClubs();
    }

    public function getNombreLicencies($id) {
        $model = new ClubsModel();
        return $model->getNombreLicencies($id);
    }


    public function getClubById($id) {
        $model = new ClubsModel();
        return $model->getClubById($id);
    }

    public function getDesignation($id) {
        $model = new ClubsModel();
        $club = $model->getClubById($id);
        return $club['designationclub'];
    }
    
}
?>