<?php
require __DIR__ . '/../../vendor/autoload.php';
use Dompdf\Dompdf;

$htmlFile = __DIR__ . '/category_explanation.html';
$pdfFile = __DIR__ . '/category_explanation.pdf';

if (!file_exists($htmlFile)) {
    echo "HTML file not found: $htmlFile\n";
    exit(1);
}

$html = file_get_contents($htmlFile);
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$output = $dompdf->output();
file_put_contents($pdfFile, $output);

echo "PDF generado: $pdfFile\n";
