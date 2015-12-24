<?php
session_start();
// include db connect class
require_once __DIR__ . '/functions.php';

// authenification script

$response = array(); 

if (!empty($_POST['vehicule'])) {
    $vehicule=$_POST['vehicule'];
    $ht=$_POST['prix'];
    $hta=$_POST['prix_a'];
    $date_accord=$_POST['accord'];
    $date_devis=$_POST['created'];
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO `devis` (`id`, `date_devis`,`date_accord`, `ht`,`hta`, `id_vehicule`) VALUES ( NULL, '$date_devis', '$date_accord','$ht', '$hta', $vehicule)");
    if ($result) {
        $_SESSION["success"] = 1;
        $_SESSION["message"] = "ajout effectué avec succès"; 
        }else{
            $_SESSION["success"] = 2;
            $_SESSION["message"] = "ajout n'est pas effectuée";
        }

}else{
    $_SESSION["success"] = 2;
    $_SESSION["message"] = "ajout n'est pas effectuée";
}

echo("<script>location.href = 'devis.php';</script>");

?>