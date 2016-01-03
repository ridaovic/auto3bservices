<?php
session_start();
// include db connect class
require_once __DIR__ . '/functions.php';

// authenification script

$response = array(); 


if ( !empty($_POST['code']) && ($_GET['code']=="FsMktZ" || $_GET['code']=="cYEcHF" || $_GET['code']=="tdHpQZ") ) {

    if (!empty($_POST['vehicule'])) {
        $vehicule=$_POST['vehicule'];
        // mysql inserting a new row
        $result = mysql_query("INSERT INTO `devis` (`id`, `created`, `id_vehicule`) VALUES ( NULL, CURRENT_TIMESTAMP, $vehicule)");
        $facture=mysql_insert_id();
        if ($result) {

            for ($i=0; $i < count($_POST['designation']); $i++) {
                $designation=$_POST['designation'][$i];
                $qte=$_POST['qte'][$i];
                $prix=$_POST['prix'][$i];

                mysql_query("INSERT INTO `details` (`id`, `designation`, `qte`, `prix`, `id_facture`) VALUES (NULL, '$designation', $qte, $prix , $facture)");
            }
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


}else{

    $_SESSION["success"] = 2;
    $_SESSION["message"] = "code de securite n'est pas correcte";

}



echo("<script>location.href = 'devis.php';</script>");

?>