<?php
require_once (realpath(dirname(__FILE__) . '/../Modele/modeleConcours.php'));

class ConcoursController {
    public function ajouterConcours() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new ConcoursModel();

            $result = $model->ajouterConcours(
                $_POST['date'],
                $_POST['club'],
                $_POST['commentaire'],
                $_POST['grille_points'],
                $_POST['nature'],
                $_POST['niveau'],
                $_POST['categorie'],
                $_POST['nombre_equipe']
            );

            if ($result) {
                header("Location: ../view/page_success.php");
                exit();
            } else {
                echo "Erreur lors de l'insertion : " . $model->db->error;
            }
        }
    }

    public function modifierConcours($data) {
        $model = new ConcoursModel();
    
        $id = $data['id'];
        $date = $data['date'];
        $club = $data['club'];
        $grille_points = $data['grille_points'];
        $nature = $data['nature'];
        $niveau = $data['niveau'];
        $categorie = $data['categorie']; 
        $nombre_equipes = $data['nombre_equipes'];       
    
        $result = $model->modifierConcours(
            $id,
            $date,
            $club,
            $grille_points,
            $nature,
            $niveau,
            $categorie,
            $nombre_equipes,
        );
    
        return $result;
    }

    public function getConcours() {
        $model = new ConcoursModel();
        return $model->getConcours();
    }

    public function getConcoursById($id) {
        $model = new ConcoursModel();
        $result = $model->getConcoursById($id);

        return $result;
    }
    public function enregistrerResultats() {
        $club_organisateur = $_POST['club_organisateur'];
        $categorie = $_POST['categorie'];
        $nombre_equipes = $_POST['nombre_equipes'];
        
        $model = new ConcoursModel();

        // Calculer les points pour le gagnant et le finaliste
        $points_gagnant = $model->calculerPoints($categorie, $nombre_equipes);
        $points_finaliste = $model->calculerPoints($categorie, $nombre_equipes);
        $points_demifinaliste = $model->calculerPoints($categorie, $nombre_equipes);

    }

}

