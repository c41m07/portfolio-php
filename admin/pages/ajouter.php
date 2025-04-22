<?php

require_once __DIR__ . '/../../src/init.php';
// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Récupération des données du formulaire
    $titre = $_POST['titre'];
    $info = $_POST['info'];
    $image = $_POST['image'];
    $lien = $_POST['lien'];
    $date_creation = $_POST['date_creation'];
// Insertion des données dans la base de données
    $insert = $pdo->prepare('INSERT INTO projets (titre, info, image, lien, date_creation) VALUES (?, ?, ?, ?, ?)');
    $insert->execute([$titre, $info, $image, $lien, $date_creation]);
// Redirection vers la page d'administration
    header('Location:' . BASE_URL . '/admin/index.php');
    exit();
}
?>
<!--html-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <base href="<?= BASE_URL ?>/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Projet</title>
    <!-- Mise à jour vers Bootstrap 5.3.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h1 class="h3 mb-0"><i class="fas fa-plus-circle me-2"></i>Ajouter un Projet</h1>
                </div>
                <div class="card-body p-4">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre du projet</label>
                            <input type="text" id="titre" name="titre" placeholder="Titre" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="info" class="form-label">Description</label>
                            <textarea id="info" name="info" placeholder="Description détaillée du projet" class="form-control" rows="5" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image du projet</label>
                            <input type="text" id="image" name="image" placeholder="Chemin image (ex: assets/img/404.webp)" class="form-control">
                            <div class="form-text">Laissez vide si pas d'image</div>
                        </div>

                        <div class="mb-3">
                            <label for="lien" class="form-label">Lien du projet</label>
                            <input type="url" id="lien" name="lien" placeholder="https://..." class="form-control">
                            <div class="form-text">Lien vers le site ou le dépôt du projet</div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="date_creation" class="form-label">Date de création</label>
                            <input type="date" id="date_creation" name="date_creation" class="form-control" required>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Ajouter
                            </button>
                            <a href="admin/index.php" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
