<?php 
ob_start();

require('ChiffresEnLettres.php'); 
require('functions.php');

$devis="";
$details="";
$total=0;
if (isset($_GET['id'])) {
    $devis = getDevis($_GET['id']);
    $details = getDetailsByIdDevis($_GET['id']);
    $total=getTotal($_GET['id']);
    if (!$devis) {
        echo("<script>location.href = 'devis.php';</script>");
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
    border: solid 1px #000;
}
td
{
 text-align: center;
 border-left: solid 1px #000; 
 border-right: solid 1px #000; 
}
.dataTable td{
padding:10px 5px;

}
.dataTable th{
padding:10px 5px;
}
-->
</style>
<page style="font-size: 12pt;" backimg="images/bg.jpg" backimgy="bottom">
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 25%; color: #444444;border: none;">
              <img style="width: 100%;" src="./images/logo.gif" alt="Logo"><br><br>
                Auto3bservices
            </td>
            <td style="width: 25%;border: none;">
             </td>
            <td style="width: 50%;border: none;">
             Marrakech , le <?php echo $devis['created']; ?>
            </td>
            </tr>
    </table>
    <br>
    <br>
    <br>

    Client : <?php echo ($devis['nom']." ".$devis['prenom']); ?><br><br>
    Véhicule :  <?php echo $devis['marque']; ?><br><br>
    Immatriculation :  <?php echo $devis['immatriculation']; ?>
    <br>
    <br>
    <table class="dataTable" cellspacing="0" style="width: 100%; border: solid 1px black; text-align: center; font-size: 10pt;">
        <tr>
            <th style="width: 40%">Désignation</th>
            <th style="width: 20%">Prix Unitaire</th>
            <th style="width: 20%">Quantité</th>
            <th style="width: 20%">Prix Net</th>
        </tr>
    </table>
    <table class="dataTable" cellspacing="0" style="width: 100%; border: solid 1px black;  text-align: center; font-size: 10pt;">
        <?php foreach ($details as $detail): ?>
          <tr>
            <td style="width: 40%"><?php echo $detail['designation']; ?></td>
            <td style="width: 20%; text-align:right;"><?php echo number_format($detail['prix'], 2, ',', ' '); ?> </td>
            <td style="width: 20%; text-align:right;"><?php echo $detail['qte']; ?>x</td>
            <td style="width: 20%; text-align:right;"><?php echo number_format( $detail['qte']*$detail['prix'], 2, ',', ' '); ?> </td>
        </tr>
        <?php endforeach ?>

        
        
        <tr>
         <th style="width: 20%;"></th>
         <th style="width: 20%;"></th>
         <th style="width: 20%;"></th>
         <th style="width: 20%;"></th>
        </tr>
        <tr>
         <th style="width: 20%;"></th>
         <th style="width: 20%;"></th>
         <th style="width: 20%; text-align:right;">Total H.T</th>
         <th style="width: 20%; text-align:right;"><?php echo number_format( $total, 2, ',', ' '); ?> </th>
        </tr>
        <tr>
         <th style="width: 20%;"></th>
         <th style="width: 20%;"></th>
         <th style="width: 20%; text-align:right;">TVA 20%</th>
         <th style="width: 20%; text-align:right;"><?php echo number_format( $total*0.2, 2, ',', ' '); ?> </th>
        </tr>
        <tr>
         <th style="width: 20%;"></th>
         <th style="width: 20%;"></th>
         <th style="width: 20%; text-align:right;">Total TTC</th>
         <th style="width: 20%; text-align:right;"><?php echo number_format( $total*1.2, 2, ',', ' '); ?> </th>
        </tr>
    </table> 
</page>
<br /><br /><br /><br /><br />
<div style="text-align: center;font-weight: bold;">
  La présente facture est arrêté à la somme de  : 
  <?php 
  $totallettre=$lettre->Conversion($total*1.2); 
   ?>
  <span style="text-transform: uppercase;"><?php echo $totallettre; ?>  TTC</span>  </div>
<br /><br /><br /><br />
<div style="position: absolute;bottom: 50px;text-align: left;line-height: 22px;">
  358. Lot Sidi Ghanem Industriel -MARRAKECH-mail:autotroisbservices@gmail.com<br>
  GSM :06 61 23 38 27 /Tel/Fax: 05 24 33  54 54/ site web : www.auto3bservices.com<br>
  RC N° 68863-PATENTE N° 46296302- I.F N° 15258590- C.N.S.S N° 4463684
</div>
<div style="position: absolute;bottom: 30px;right:0;">
<img src="images/qrcode.jpg" width="100">
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
