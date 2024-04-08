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
                $_POST['categorie']
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
    
        $result = $model->modifierConcours(
            $id,
            $date,
            $club,
            $grille_points,
            $nature,
            $niveau,
            $categorie,
           
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
}
?>
