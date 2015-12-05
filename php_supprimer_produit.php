<?php
session_start();
// include db connect class
require_once __DIR__ . '/functions.php';
// authenification script

$response = array(); 

if ( !empty($_GET['ref']) ) {

    $ref=$_GET['ref'];
    
     // mysql inserting a new row
    $result = mysql_query("DELETE FROM `produits` WHERE `ref` = '$ref'");

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

echo("<script>location.href = 'produits.php';</script>"); 
?>