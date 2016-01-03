<?php
session_start();
// include db connect class
require_once __DIR__ . '/functions.php';

// authenification script


if ( !empty($_POST['code']) && ($_GET['code']=="FsMktZ" || $_GET['code']=="cYEcHF") ) {

    if (!empty($_POST['facture'])) {
    $facture=$_POST['facture'];
    // mysql inserting a new row
    $result = mysql_query("UPDATE factures SET `created` = CURRENT_TIMESTAMP WHERE `id` = $facture");
    $result = mysql_query("DELETE FROM `designation` WHERE `id_facture` = $facture");


    
    if ($result) {
        for ($i=0; $i < count($_POST['designation']); $i++) {
            $designation=$_POST['designation'][$i];
            $qte=$_POST['qte'][$i];
            $prix=$_POST['prix'][$i];

            mysql_query("INSERT INTO `designation` (`id`, `designation`, `qte`, `prix`, `id_facture`) VALUES (NULL, '$designation', $qte, $prix , $facture)");
        }
        $_SESSION["success"] = 1;
        $_SESSION["message"] = "modification effectué avec succès"; 
        }else{
            $_SESSION["success"] = 2;
            $_SESSION["message"] = "modification n'est pas effectuée";
        }

}else{
    $_SESSION["success"] = 2;
    $_SESSION["message"] = "modification n'est pas effectuée";
}
}
else{

    $_SESSION["success"] = 2;
    $_SESSION["message"] = "code de securite n'est pas correcte";

}

echo("<script>location.href = 'factures.php';</script>");

?>