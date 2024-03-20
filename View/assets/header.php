<?php

require_once (realpath(dirname(__FILE__) . '/../../Controller/controllerUtilisateur.php'));

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FFBSQ</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ajoutez d'autres liens CSS ou balises meta au besoin -->
</head>
<body>
<div class="container-fluid bg-dark text-white py-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Compte connecté -->
                <span>Compte connecté: <strong><?php echo $userInfo['prenom'] . ' ' . $userInfo['nom']; ?></strong></span>
            </div>
            <div class="col-md-6 text-end">
                <!-- Date et heure de connexion -->
                <span>Date et heure de connexion: <strong><?php echo $userInfo['derniere_connexion']; ?></strong></span>
            </div>
        </div>
    </div>
</div>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light flex-column">
    <div class="container">
        <a class="navbar-brand" href="#">FFBSQ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Ajoutez des liens de navigation ici, par exemple : -->
                <li class="nav-item">
                    <a class="nav-link" href="/view/tableau_de_bord.php">Tableau de bord</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="/view/licence/licences.php">Licences</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/view/clubs/clubs.php">Clubs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/view/concours/concours.php">Concours</a>
                </li>
                <!-- deconnexion.php à droite -->
                <li class="nav-item mt-auto"> <!-- Utilisez mt-auto pour aligner le lien de déconnexion en bas -->
                    <a class="nav-link" href="/view/deconnexion.php">Se déconnecter</a>
                </li>
                <!-- Vous pouvez ajouter d'autres liens de navigation selon vos besoins -->
            </ul>
        </div>
    </div>
</nav>

<!-- Contenu principal commence ici -->
<div class="container mt-5">
<!-- Insérez votre contenu principal ici -->
</div>

<!-- Ajouter des scripts JavaScript pour le menu dynamique -->
<script>
    // Code JavaScript pour le menu dynamique
    // Par exemple, détecter la fenêtre active et mettre en surbrillance le lien correspondant dans le menu
</script>
</body>
</html>
