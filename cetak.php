<?php
require_once 'dompdf\autoload.inc.php';

use Dompdf\Dompdf;

$pdf = new Dompdf();

$html_file = file_get_contents('http://localhost/TalentaIndonesia/cetak/page.php');
$pdf->loadHtml($html_file);

$pdf->render();

$pdf->stream('example.pdf', array('Attachment' => false));

// $dompdf->output('document.pdf', 'D')
?>