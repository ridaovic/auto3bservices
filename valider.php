<?php
session_start();
// include db connect class
require_once __DIR__ . '/functions.php';
// authenification script

$response = array(); 

if ( !empty($_GET['code']) && ($_GET['code']=="FsMktZ" || $_GET['code']=="cYEcHF")  ) {

    if ( !empty($_GET['id']) ) {

        $id=$_GET['id'];
        $etat=$_GET['etat'];
        
         // mysql inserting a new row
        $result = mysql_query("UPDATE factures SET etat = '$etat'  WHERE `id` = '$id'");

        if ($result>0) { 
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