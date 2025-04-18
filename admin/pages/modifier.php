<?php
require_once __DIR__ . '/../../src/init.php';
$id = $_GET['id'] ?? 0;

$edit = $pdo->prepare('SELECT * FROM projets WHERE id = ?');
$edit->execute([$id]);
$projet = $edit->fetch();
if (!$projet) {
    echo "Projet introuvable.";
    exit();
}
// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $titre = $_POST['titre'];
    $info = $_POST['info'];
    $image = $_POST['image'];
    $lien = $_POST['lien'];
    $date_creation = $_POST['date_creation'];

    // Mise à jour des données dans la base de données
    $update = $pdo->prepare('UPDATE projets SET titre = ?, info = ?, image = ?, lien = ?, date_creation = ? WHERE id = ?');
    $update->execute([$titre, $info, $image, $lien, $date_creation, $id]);

    // Redirection vers la page d'administration
    header('Location:'.BASE_URL.'/admin/index.php');
    exit();
}
?>

<!--html-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Projet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark">
                    <h1 class="h3 mb-0"><i class="fas fa-edit me-2"></i>Modifier le Projet</h1>
                </div>
                <div class="card-body p-4">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre du projet</label>
                            <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($projet['titre']) ?>" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="info" class="form-label">Description</label>
                            <textarea id="info" name="info" class="form-control" rows="5" required><?= htmlspecialchars($projet['info']) ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Image du projet</label>
                            <input type="text" id="image" name="image" value="<?= htmlspecialchars($projet['image']) ?>" class="form-control">
                            <div class="form-text">Chemin relatif vers l'image (ex: assets/img/projet.png)</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="lien" class="form-label">Lien du projet</label>
                            <input type="url" id="lien" name="lien" value="<?= htmlspecialchars($projet['lien']) ?>" class="form-control">
                            <div class="form-text">URL complète (https://...)</div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="date_creation" class="form-label">Date de création</label>
                            <input type="date" id="date_creation" name="date_creation" value="<?= $projet['date_creation'] ?>" class="form-control" required>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save me-2"></i>Enregistrer les modifications
                            </button>
                            <a href="../index.php" class="btn btn-secondary">
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
