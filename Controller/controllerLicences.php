<?php

require_once (realpath(dirname(__FILE__) . '/../Modele/modeleLicences.php'));

class LicencesController
{
    public function ajouterLicence() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new LicencesModel();

            $result = $model->ajouterLicence(
                $_POST['numLicencie'],
                $_POST['nomlicencie']
            );

            if ($result) {
                header("Location: /view/licence/licences.php");
                exit();
            } else {
                echo "Erreur lors de l'insertion : " . $model->db->error;
            }
        }
    }

    public function changerClubLicence() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new LicencesModel();

            $result = $model->changerClubLicence(
                $_POST['numLicencie'],
                $_POST['numeroaffiliation']
            );

            if ($result) {
                header("Location: /view/licence/licences.php");
                exit();
            } else {
                echo "Erreur lors de la mise à jour : " . $model->db->error;
            }
        }   
    }

    public function getLicencie() {
        $model = new LicencesModel();
        $result = $model->getLicencie();

        return $result;
    }

    public function getClubs() {
        $model = new LicencesModel();
        $result = $model->getClubs();

        return $result;
    }

    public function getLicencieById($id) {
        $model = new LicencesModel();
        $result = $model->getLicencieById($id);

        return $result;
    }

    public function updateLicencie($data) {
        $model = new LicencesModel();
    
        $idLicencie = $data['idLicencie'];
        $nom = $data['LicenceNom'];
        $prenom = $data['LicencePrenom'];
        $sexe = $data['LicenceSexe'];
        $dateNaissance = $data['LicenceDateDeNaissance'];
        $categorie = $data['LicenceCategorie'];
        $position = $data['LicencePosition'];
        $adresse = $data['LicenceAdresse'];
        $ville = $data['LicenceVille'];
        $telephone = $data['LicenceTelephone'];
        $email = $data['LicenceEmail'];
        $nationalite = $data['LicenceNationalite'];
        $classification = $data['LicenceClassification'];
        $validiteCM = $data['LicenceCM'];
        $anneeReprise = $data['AnneeReprise'];
        $premiereLicence = $data['LicencePremiere'];
        $club = $data['LicenceClub'];
    
        $result = $model->updateLicencie(
            $idLicencie,
            $nom,
            $prenom,
            $sexe,
            $dateNaissance,
            $categorie,
            $position,
            $adresse,
            $ville,
            $telephone,
            $email,
            $nationalite,
            $classification,
            $validiteCM,
            $anneeReprise,
            $premiereLicence,
            $club
        );
    
        return $result;
    }

    public function updateToken($idLicencie, $token) {
        $model = new LicencesModel();
        $result = $model->updateToken($idLicencie, $token);

        return $result;
    }

    public function getLicencieByToken($token) {
        $model = new LicencesModel();
        $result = $model->getLicencieByToken($token);

        return $result;
    }

    public function getLicencieBySearch($nom, $prenom, $numlicencie, $annee_reprise) {
        $model = new LicencesModel();
        $result = $model->getLicencieBySearch($nom, $prenom, $numlicencie, $annee_reprise);

        return $result;
    }

    public function searchLicencie($searchNom, $searchPrenom, $searchNumLicence) {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new LicencesModel();

            $nom = $_POST['searchNom'];
            $prenom = $_POST['searchPrenom'];
            $numlicencie = $_POST['searchNumLicence'];

            $result = $model->getLicencieBySearch($nom, $prenom, $numlicencie);

            return $result;
        }
    }


    
    

}

?>