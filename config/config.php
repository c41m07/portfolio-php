<?php
define('ROOT_PATH', dirname(__DIR__)); // Pointe vers le dossier portfolio-php
define('BASE_URL', 'http://localhost/portfolio-php');

try {
    $pdo = new PDO('mysql:host=localhost:3307;dbname=portefolio', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo 'Connexion réussie à la base de données !';
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
    exit();
}
?>
