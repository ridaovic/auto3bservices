<?php
session_start();
// include db connect class
require_once __DIR__ . '/functions.php';
// authenification script

$response = array(); 

if ( !empty($_GET['num_fact']) ) {

    $num_fact=$_GET['num_fact'];
    
     // mysql inserting a new row
    $result = mysql_query("DELETE FROM `factures` WHERE `num_fact` = '$num_fact'");

    if ($result>0) { 
        $_SESSION["success"] = 1;
        $_SESSION["message"] = "suppression effectué avec succès";    
    }else{
        $_SESSION["success"] = 2;
        $_SESSION["message"] = "suppression n'est pas effectuée";
    }

}else{
    $_SESSION["success"] = 2;
    $_SESSION["message"] = "suppression n'est pas effectuée";
}

echo("<script>location.href = 'factures.php';</script>"); 
?>