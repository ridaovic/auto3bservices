<?php
session_start();
// include db connect class
require_once __DIR__ . '/functions.php';

// authenification script

$response = array(); 


if ( !empty($_POST['code']) && ($_GET['code']=="FsMktZ" || $_GET['code']=="cYEcHF") ) {
    if (!empty($_POST['vehicule'])) {
        $vehicule=$_POST['vehicule'];
        $etat=0;
        if (isset($_POST['etat'])) {
            $etat=1;
        }
        // mysql inserting a new row
        $result = mysql_query("INSERT INTO `factures` (`id`, `created`, `etat`, `id_vehicule`) VALUES ( NULL, CURRENT_TIMESTAMP, '$etat', $vehicule)");
        $facture=mysql_insert_id();
        if ($result) {

            $occ=0;
            
            for ($i=0; $i < count($_POST['designation']); $i++) {
                $designation=$_POST['designation'][$i];
                $qte=$_POST['qte'][$i];
                $prix=$_POST['prix'][$i];

                if (in_array($i, $_POST['occ'])) {
                    $occ=1;
                }

                mysql_query("INSERT INTO `designation` (`id`, `occasion`, `designation`, `qte`, `prix`, `id_facture`) VALUES (NULL, '$occ', '$designation', $qte, $prix , $facture)");
                
                $occ=0;
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

}
else{

    $_SESSION["success"] = 2;
    $_SESSION["message"] = "code de securite n'est pas correcte";

}

echo("<script>location.href = 'factures.php';</script>");

?>