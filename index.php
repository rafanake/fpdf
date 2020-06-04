<?php

use Rafanake\FPDF;
use Rafanake\Plugin\BarCode128;
use Rafanake\Plugin\Semacode;

require_once './vendor/autoload.php';

$x = 10;
$y = 10;
$pdf = new FPDF();
$barcode = new BarCode128();

$pdf->AddFont('Calligrapher', '', 'calligra.php');
$pdf->AddFont('Roboto', '', 'roboto.php');
$pdf->AddPage();
$pdf->SetY($y += 10);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Hello World!');
$pdf->SetY($y += 10);
$pdf->SetFont('Helvetica', 'B', 16);
$pdf->Cell(40, 10, 'Hello World!');
$pdf->SetY($y += 10);
$pdf->SetFont('Courier', 'B', 16);
$pdf->Cell(40, 10, 'Hello World!');
$pdf->SetY($y += 10);
$pdf->SetFont('Times', 'B', 16);
$pdf->Cell(40, 10, 'Hello World!');
$pdf->SetY($y += 10);
$pdf->SetFont('Symbol', 'B', 16);
$pdf->Cell(40, 10, 'Hello World!');
$pdf->SetY($y += 10);
$pdf->SetFont('ZapfDingbats', 'B', 16);
$pdf->Cell(40, 10, 'Hello World!');
$pdf->SetY($y += 10);
$pdf->SetFont('Roboto', '', 16);
$pdf->Cell(40, 10, 'Hello World!');
$pdf->SetY($y += 10);
$pdf->SetFont('Calligrapher', '', 16);
$pdf->Cell(40, 10, 'Hello World!');
$pdf->SetY($y += 10);

// barcode
$barcode->draw($pdf, $x, $y, 'Sample-Barcode', 100, 20);
$pdf->SetY($y += 30);

// semacode
$datamatrix = '432503350008816914001010018515J879336990BR2500000050000067990215045530100313OaKx0000001981565784-00.000000-00.000000|';
$file = './semacode.png';
$semaCodeGD = (new Semacode())->asGDImage($datamatrix);
imagepng($semaCodeGD, $file);
$pdf->Image($file);
imagedestroy($semaCodeGD);
unlink($file);


$pdf->Output();


