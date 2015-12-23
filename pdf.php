<?php
// (c) Xavier Nicolay
// Exemple de génération de devis/facture PDF

require('invoice.php');
require('functions.php');

$facture="";
if (isset($_GET['id'])) {
    $facture = getFacture($_GET['id']);
    if (!$facture) {
        echo("<script>location.href = 'factures.php';</script>");
    }
}


$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "Auto3bservices",
                  "MonAdresse\n" .
                  "275000 PARIS\n".
                  "R.C.S. PARIS B 000 000 007\n" .
                  "Capital : 18000 " . EURO );
$pdf->temporaire( "Auto3bservices" );
$pdf->addDate( $facture['date_fact']);
$pdf->addFactureInfos("
Nom et Prenom : ".$facture['nom']." ".$facture['prenom']."\n
Assurance :  ".$facture['assurance']."\n
Expere :  ".$facture['expere']);

$cols=array( "REFERENCE"    => 23,
             "DESIGNATION"  => 147,
             "TOTAL"          => 20 );

$pdf->addCols( $cols);

$cols=array( "REFERENCE"    => "L",
             "DESIGNATION"  => "L",
             "TOTAL"          => "C" );

$pdf->addLineFormat( $cols);

$y    = 90;

$line = array( "REFERENCE"    => $facture['num_fact'],
               "DESIGNATION"  => $facture['designation'],
               "TOTAL"        => $facture['total'] );
$size = $pdf->addLine( $y, $line );
$y   += $size + 2;


$pdf->Output();
?>
