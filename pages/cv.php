<?php
require_once '../vendor/autoload.php';


use Dompdf\Dompdf;

// Créer une instance de Dompdf
$dompdf = new Dompdf();

// Ton contenu HTML du CV (tu peux styliser avec du CSS inline ou intégré)
$html = '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CV Kévin</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; padding: 20px; }
        h1 { color: #39ff14; }
    </style>
</head>
<body>
    <h1>Test CV</h1>
    
</body>
</html>
';

// Charger le HTML
$dompdf->loadHtml($html);

// Définir le format du papier
$dompdf->setPaper('A4', 'portrait');

// Générer le PDF
$dompdf->render();

// Télécharger le fichier
$dompdf->stream("cv-kevin.pdf", ["Attachment" => true]);
