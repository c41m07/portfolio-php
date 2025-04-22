<?php

require_once __DIR__ . '/../../src/init.php';
// Détruire la session
session_destroy();
// Rediriger vers la page de connexion
header('Location:' . BASE_URL . '/admin/pages/login.php');
exit();
