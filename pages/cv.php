<?php

require_once '../vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

// Configuration des options
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$options->set('chroot', realpath(''));

// Créer une instance de Dompdf avec les options
$dompdf = new Dompdf($options);

// Récupérer le contenu HTML
$html = file_get_contents('http://localhost/CV-php/index.php');

// Ajouter uniquement votre CSS simplifié pour l'impression
$html .= '<style>' . file_get_contents('http://localhost/CV-php/public/css/style.css') . '</style>';

// Supprimer toutes les références à Bootstrap et autres ressources externes
// qui pourraient causer des problèmes avec Dompdf
$html = preg_replace('/<link[^>]*bootstrap[^>]*>/', '', $html);
$html = preg_replace('/<script[^>]*bootstrap[^>]*><\/script>/', '', $html);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("cv-kevin.pdf", ["Attachment" => true]);