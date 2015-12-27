<?php
// (c) Xavier Nicolay
// Exemple de génération de devis/facture PDF

include('ChiffresEnLettres.php'); 


require('invoice.php');
require('functions.php');

$facture="";
$designation="";
$total=0;
if (isset($_GET['id'])) {
    $facture = getFacture($_GET['id']);
    $designations = getDesignationByIdFacture($_GET['id']);
    $total=getTotal($_GET['id']);
    if (!$facture) {
        echo("<script>location.href = 'factures.php';</script>");
    }
}

$lettre=new ChiffreEnLettre(); 



$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "Auto3bservices",
                  "MonAdresse\n" .
                  "275000 PARIS\n".
                  "R.C.S. PARIS B 000 000 007\n" .
                  "Capital : 18000 " . EURO );
$pdf->temporaire( "Auto3bservices" );
$pdf->addDate( $facture['created']);
$pdf->addFactureInfos("
Nom et Prenom : ".$facture['nom']." ".$facture['prenom']."\n
Assurance :  ".$facture['assurance']."\n
Expere :  ".$facture['expere']);

$cols=array("DESIGNATION"  => 100,
             "QUANTITE"     => 30,
             "P.U. HT"      => 30,
             "MONTANT H.T." => 30
             );
$pdf->addCols( $cols);
$cols=array( "DESIGNATION"  => "L",
             "QUANTITE"     => "C",
             "P.U. HT"      => "R",
             "MONTANT H.T." => "R"
             );
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);

$y    = 90;

foreach ($designations as $designation) {
  $line = array( "DESIGNATION"  => $designation['designation'],
               "QUANTITE"     => $designation['qte'],
               "P.U. HT"      => $designation['prix'],
               "MONTANT H.T." => $designation['qte']*$designation['prix']
                );
$size = $pdf->addLine( $y, $line );
$y   += $size + 2;

}

$y   =  140;
$line = array( "DESIGNATION"  => $designation['designation'],
               "QUANTITE"     => $designation['qte'],
               "P.U. HT"      => $designation['prix'],
               "MONTANT H.T." => $designation['qte']*$designation['prix']
                );
$size = $pdf->addLine( $y, $line );



$pdf->addTotal($total);

//$lt=$lettre->Conversion(250); 

$pdf->Output();
?>
