<?php
require_once '../vendor/autoload.php';


use Dompdf\Dompdf;

// Créer une instance de Dompdf
$dompdf = new Dompdf();


// Récupérer le contenu HTML du lien
$html = file_get_contents('http://localhost/CV-php/');

// Ajouter les styles CSS
$html .= '<style>' . file_get_contents('http://localhost/CV-php/public/css/style.css') . '</style>';

// Charger le HTML avec les styles
$dompdf->loadHtml($html);

// Définir le format du papier
$dompdf->setPaper('A4', 'portrait');

// Générer le PDF
$dompdf->render();

// Télécharger le fichier
$dompdf->stream("cv-kevin.pdf", ["Attachment" => true]);
