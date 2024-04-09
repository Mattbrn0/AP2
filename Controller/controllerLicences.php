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
        
            $idLicencie = $data['numlicencie'];
            $nom = $data['nomlicencie'];
            $prenom = $data['prenomlicencie'];
            $sexe = $data['sexelicencie'];
            $dateNaissance = $data['datedenaissance'];
            $categorie = $data['categorielicencie'];
            $position = $data['positionlicencie'];
            $adresse = $data['adr_licencie'];
            $ville = $data['adr_ville_licencie'];
            $telephone = $data['tel_licencie'];
            $email = $data['mail_licencie'];
            $nationalite = $data['nationalite_licencie'];
            $classification = $data['classification_licencie'];
            $validiteCM = $data['validite_CM'];
            $anneeReprise = $data['annee_reprise'];
            $premiereLicence = $data['premiere_licence'];
            $numeroaffiliation = $data['numeroaffiliation'];
            $club = $data['club_licence'];
        
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
                $numeroaffiliation,
                $club
            );
        
            return $result;
        }
        
        

    }

    ?>