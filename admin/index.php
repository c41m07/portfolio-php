<?php
require_once __DIR__ . '/../src/init.php';

// Vérification de la connexion
if (!($_SESSION['connecte'] ?? false)) {
    header('Location:'.BASE_URL.'/admin/pages/login.php');
    exit();
}

//récupération des projets de la BDD
$projets = $pdo->query('SELECT * FROM projets ORDER BY projets.date_creation DESC')->fetchAll();
?>
<!--html-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <base href="<?= BASE_URL ?>/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Portfolio</title>
    <!-- Mise à jour vers Bootstrap 5.3.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-5 text-primary"><i class="fas fa-cogs me-2"></i>Gestion des Projets</h1>
        <div class="d-flex gap-2">
            <a href="index.php" class="btn btn-outline-secondary transition-hover">
                <i class="fas fa-home me-2"></i>Voir le site
            </a>
            <a href="admin/component/logout.php" class="btn btn-outline-danger transition-hover">
                <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
            </a>
        </div>
    </div>
    
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <a href="admin/pages/ajouter.php" class="btn btn-primary transition-hover">
                <i class="fas fa-plus-circle me-2"></i>Ajouter un nouveau projet
            </a>
        </div>
    </div>

    <!-- Message de citation inspirante -->
    <div class="alert alert-info mb-4" role="alert">
        <i class="fas fa-lightbulb me-2"></i>
        <span id="footer-quote">Chargement d'une citation inspirante...</span>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                    <tr class="table-row">
                        <th>ID</th>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Date Création</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($projets)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-4">Aucun projet disponible</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($projets as $projet): ?>
                            <tr class="transition-hover">
                                <td><?= $projet['id'] ?></td>
                                <td>
                                    <?php if (!empty($projet['image'])): ?>
                                        <img src="<?= htmlspecialchars($projet['image']) ?>" alt="miniature" style="height: 50px; border-radius: 5px;">
                                    <?php else: ?>
                                        <span class="text-muted">Aucune</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($projet['titre']) ?></td>
                                <td><?= htmlspecialchars($projet['date_creation']) ?></td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <a href="admin/pages/modifier.php?id=<?= $projet['id'] ?>" class="btn btn-sm btn-warning transition-hover">Modifier</a>
                                        <a href="admin/component/supprimer.php?id=<?= $projet['id'] ?>" class="btn btn-sm btn-danger transition-hover"
                                           onclick="return confirm('Supprimer ce projet définitivement ?');">
                                            Supprimer
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="card mt-4 shadow-sm border-0">
        <div class="card-footer text-center p-3">
            <button class="btn btn-outline-primary quote-button transition-hover">
                <i class="fas fa-sync-alt me-2"></i>Nouvelle citation
            </button>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>
