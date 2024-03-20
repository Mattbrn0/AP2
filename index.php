<?php
session_start();
if (isset($_SESSION['utilisateur_id'])) {
    header("Location: ./view/tableau_de_bord.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion/inscription - FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ajouter des styles personnalisés -->
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            margin-top: 50px;
            flex: 1;
        }

        .nav-tabs .nav-link {
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 0.25rem 0.25rem 0 0;
        }

        .nav-tabs .nav-link.active {
            background-color: #fff;
            color: #007bff;
            border-color: #dee2e6 #dee2e6 #fff;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        label {
            font-weight: bold;
        }

        button[type="submit"] {
            background-color: #007bff;
            border: none;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .ffbsq-logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 150px;
        }

    </style>
</head>
<body>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="./assets/img/logo_ffbsq.png" alt="Logo FFBSQ" class="ffbsq-logo">
                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="connexion-tab" data-bs-toggle="tab" href="#connexion" role="tab" aria-controls="connexion" aria-selected="true">Connexion</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="inscription-tab" data-bs-toggle="tab" href="#inscription" role="tab" aria-controls="inscription" aria-selected="false">Inscription</a>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="myTabsContent">
                    <div class="tab-pane fade show active" id="connexion" role="tabpanel" aria-labelledby="connexion-tab">
                        <form action="./Controller/controllerConnexion.php" method="post">
                            <h2>Connexion</h2>
                            <div class="mb-3">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" class="form-control" name="login" id="login" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="inscription" role="tabpanel" aria-labelledby="inscription-tab">
                        <form action="" method="post">
                            <h2>Inscription</h2>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" required>
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="prenom" id="prenom" required>
                            </div>
                            <div class="mb-3">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" class="form-control" name="login" id="login" required>
                            </div>
                            <div class="mb-3">
                                <label for="mot_de_passe" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">S'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
