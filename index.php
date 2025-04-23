<?php
require_once __DIR__ . '/src/init.php';

require_once __DIR__ . '/template/include/header.php';

//récupération des projets de la BDD
$projets = $pdo->query('SELECT * FROM projets')->fetchAll();

?>
<!--html-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <base href="<?= BASE_URL ?>/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">0
    <title>Mon Portfolio</title>
    <!-- Mise à jour vers Bootstrap 5.3.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<main class="bg-light min-vh-100">
    <!-- Section d'entête améliorée -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center my-5">
            <h1 class="display-3 fw-bold">Bienvenue sur mon portfolio</h1>
            <div class="col-lg-8 mx-auto">
                <p class="lead fs-4 mt-3">
                    Découvrez mes projets, mon parcours et mes compétences.
                </p>
<!--                <a href="pages/cv.php" class="btn btn-primary">Télécharger mon CV</a>-->
            </div>
        </div>
    </section>

    <!-- Section Accueil améliorée -->
    <section class="py-5 bg-white" id="accueil">
        <div class="container my-4">
            <h2 class="h2 fw-bold text-primary mb-4">Accueil</h2>
            <p class="lead">
                Bienvenue sur mon portfolio ! Ici, vous découvrirez mes projets, mon parcours et mes compétences.
                Explorez et n'hésitez pas à me contacter pour toute collaboration ou question.
            </p>
        </div>
    </section>

    <!-- Section À Propos améliorée -->
    <section class="py-5 bg-light" id="a-propos">
        <div class="container">
            <h2 class="h2 fw-bold text-primary mb-4">À Propos</h2>
            <div class="row">
                <div class="col-lg-12">
                    <p class="lead">
                        Je suis Kévin, un développeur passionné par la création de sites web et d'applications. Mon portfolio
                        présente mes projets, mon parcours professionnel et mes compétences techniques. Explorez mes
                        réalisations et n'hésitez pas à me contacter pour toute collaboration ou question.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Portfolio améliorée -->
    <section class="py-5 bg-white" id="portfolio">
        <div class="container">
            <h2 class="h2 fw-bold text-primary mb-4">Mon Portfolio</h2>

            <?php if (empty($projets)) : ?>
                <div class="alert alert-info">Aucun projet à afficher pour le moment.</div>
            <?php else : ?>
                <div class="row g-4">
                    <?php foreach ($projets as $projet) : ?>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card h-100 shadow-sm border-0 transition-hover">
                                <?php if (!empty($projet['image'])) : ?>
                                    <img src="<?= htmlspecialchars($projet['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($projet['titre']) ?>">
                                <?php else : ?>
                                    <div class="bg-secondary text-white text-center p-5">
                                        <i class="fas fa-code fa-3x"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold"><?= htmlspecialchars($projet['titre']) ?></h5>
                                    <p class="card-text text-muted"><?= substr(htmlspecialchars($projet['info']), 0, 100) ?>...</p>
                                </div>
                                <div class="card-footer bg-white border-0">
                                    <a href="pages/projet.php?id=<?= $projet['id'] ?>" class="btn btn-outline-primary w-100">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Section Contact améliorée -->
    <section class="py-5 bg-light" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="h2 fw-bold text-primary mb-4 text-center">Contact</h2>
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4 p-md-5">
                            <form method="post" action="src/contact.php" class="row g-3 d-flex flex-column align-items-center mx-auto">
                                <div class="mb-3 col-md-10">
                                    <label for="name" class="form-label">Nom</label>
                                    <input id="name" name="name" required type="text" class="form-control" placeholder="Votre nom">
                                </div>

                                <div class="mb-3 col-md-10">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" name="email" required type="email" class="form-control" placeholder="Votre email">
                                </div>

                                <div class="mb-4 col-md-10">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea id="message" name="message" required rows="5" class="form-control" placeholder="Votre message"></textarea>
                                </div>

                                <div class="text-center col-md-10">
                                    <button type="submit" class="btn btn-primary px-5 py-2">Envoyer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- Scripts mis à jour -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>

<?php require_once ROOT_PATH . '/template/include/footer.php'; ?>
