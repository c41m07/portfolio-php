<?php
require_once __DIR__ . '/../../src/init.php';



if (!isset($_GET['id'])) {
    echo "Aucun projet sélectionné.";
    exit();
}else {
    $id = $_GET['id'];
    $del = $pdo->prepare('DELETE FROM projets WHERE id = ?');
    $del->execute([$id]);
}

// Redirection vers la page d'administration
header('Location:'.BASE_URL.'/admin/index.php');
exit();

