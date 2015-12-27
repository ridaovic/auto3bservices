<?php 
ob_start();

require('ChiffresEnLettres.php'); 
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


?>
<style type="text/css">
<!--
table
{
    width:  100%;
    border:none;
    border-collapse: collapse;
}
th
{
    text-align: center;
    border: solid 1px #eee;
    background: #f8f8f8;
}
td
{
    text-align: center;
     
    
}
.dataTable td{
padding:10px 5px;
background-color:#efefef;
}
.dataTable th{
padding:10px 5px;
}
-->
</style>
<page style="font-size: 12pt" backimgy="bottom">
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 25%; color: #444444;">
              <img style="width: 100%;" src="./images/logo.gif" alt="Logo"><br><br>
                Auto3bservices
            </td>
            <td style="width: 25%;">
             </td>
            <td style="width: 50%;">
             Marrakech , le <?php echo $facture['created']; ?>
            </td>
            </tr>
    </table>
    <br>
    <br>
    <br>

    Nom et Prenom : <?php echo ($facture['nom']." ".$facture['prenom']); ?><br><br>
    Assurance :  <?php echo $facture['assurance']; ?><br><br>
    Expere :  <?php echo $facture['expere']; ?>
    <br>
    <br>
    <table class="dataTable" cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
        <tr>
            <th style="width: 40%">Désignation</th>
            <th style="width: 20%">Prix Unitaire</th>
            <th style="width: 20%">Quantité</th>
            <th style="width: 20%">Prix Net</th>
        </tr>
    </table>
    <table class="dataTable" cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
        <?php foreach ($designations as $designation): ?>
          <tr>
            <td style="width: 40%"><?php echo $designation['designation']; ?></td>
            <td style="width: 20%; text-align:right;"><?php echo $designation['prix']; ?> DH</td>
            <td style="width: 20%; text-align:right;"><?php echo $designation['qte']; ?>x</td>
            <td style="width: 20%; text-align:right;"><?php echo $designation['qte']*$designation['prix']; ?> DH</td>
        </tr>
        <?php endforeach ?>

        
        
        <tr>
         <th style="width: 20%;"></th>
         <th style="width: 20%;"></th>
              <th style="width: 20%; text-align:right;">Total H.T</th>
              <th style="width: 20%; text-align:right;"><?php echo $total ?> DH</th>
        </tr>
        <tr>
         <th style="width: 20%;"></th>
         <th style="width: 20%;"></th>
              <th style="width: 20%; text-align:right;">TVA 20%</th>
              <th style="width: 20%; text-align:right;"><?php echo $total*0.2 ?> DH</th>
        </tr>
        <tr>
         <th style="width: 20%;"></th>
         <th style="width: 20%;"></th>
              <th style="width: 20%; text-align:right;">Total TTC</th>
              <th style="width: 20%; text-align:right;"><?php echo $total*1.2 ?> DH</th>
        </tr>
    </table> 
</page>
<br /><br /><br /><br /><br />
<div style="text-align: center;font-weight: bold;">
  La présente facture est arrêté à la somme de  : 
  <?php 
  $totallettre=$lettre->Conversion($total*1.2); 
   ?>
  <span style="text-transform: uppercase;"><?php echo $totallettre; ?> DHS  TTC</span>  </div>
<br /><br /><br /><br />
<div style="position: absolute;bottom: 50px;text-align: center;left: 150px;">
  358. Lot Sidi Ghanem Industriel -MARRAKECH-mail:autotroisbservices@gmail.com<br>
  GSM :06 61 23 38 27 /Tel/Fax: 05 24 33  54 54/ site web : www.auto3bservices.com<br>
  RC N° 68863-PATENTE N° 46296302- I.F N° 15258590- C.N.S.S N° 4463684
</div>


<?php 
    $content = ob_get_clean();
    require_once(dirname(__FILE__).'/vendor/autoload.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('facture.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
