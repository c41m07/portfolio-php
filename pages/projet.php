<?php
require_once __DIR__ . '/../src/init.php';

// Vérification de l'ID du projet
if (!isset($_GET['id'])) {
    echo "Aucun projet sélectionné.";
    exit();
} else {
    $id = $_GET['id'];
    $projet = $pdo->prepare('SELECT * FROM projets WHERE id = ?');
    $projet->execute([$id]);
    $projet = $projet->fetch();
    if (!$projet) {
        echo "Projet introuvable.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <base href="<?= BASE_URL ?>/">
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($projet['titre']) ?></title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light" >

<div class="container my-5 p-5 bg-white rounded shadow-lg border">
    <!-- Titre du projet -->
    <h1 class="display-3 text-primary fw-bold mb-4 border-bottom pb-3"><?= htmlspecialchars($projet['titre']) ?></h1>

    <!-- Image du projet -->
    <?php if (!empty($projet['image'])) : ?>
        <div class="text-center mb-4">
            <img src="<?= htmlspecialchars($projet['image']) ?>" class="img-fluid rounded-3 shadow-sm hover-zoom border border-2 w-100 mx-auto d-block" alt="<?= htmlspecialchars($projet['titre']) ?>">
        </div>
    <?php endif; ?>

    <!-- info complète -->
    <div class="my-4 p-3 bg-light rounded">
        <p class="lead fs-5 lh-base"><?= nl2br(htmlspecialchars($projet['info'])) ?></p>
    </div>

    <!-- Boutons d'action -->
    <div class="d-flex flex-wrap gap-3 mt-4">
        <!-- Bouton pour aller vers le lien du projet externe -->
        <?php if (!empty($projet['lien'])) : ?>
            <a href="<?= htmlspecialchars($projet['lien']) ?>" class="btn btn-primary btn-lg shadow-sm" target="_blank">
                <i class="fas fa-external-link-alt me-2"></i>Voir le projet
            </a>
        <?php endif; ?>

        <!-- Bouton retour à l'accueil -->
        <a href="index.php" class="btn btn-outline-secondary btn-lg">
            <i class="fas fa-home me-2"></i>Retour à l'accueil
        </a>
    </div>
</div>

<!-- Bootstrap & Font Awesome JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
