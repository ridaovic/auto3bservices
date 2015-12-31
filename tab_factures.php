<?php 
// include db connect class
require_once __DIR__ . '/functions.php';

if (!empty($_POST['id'])) {
    $id=$_POST['id'];

$result = mysql_query("SELECT vehicules.nom as nom,vehicules.prenom as prenom,factures.id as id FROM factures , vehicules WHERE id_vehicule = $id and id_vehicule=vehicules.id ") or die(mysql_error());

while($row = mysql_fetch_array($result)){
$nom=$row['nom'];
$prenom=$row['prenom'];
$total=getTotal($row['id']);
$id=$row['id'];
echo "<tr><td>$nom $prenom ( $total DH) <a class='btn btn-primary blue_b btn-rounded pull-right' href='facture.php?id=$id'><i class='fa fa-file-pdf-o'></i></a></td></tr>";
}
}
?>
