<?php
session_start();
// include db connect class
require_once __DIR__ . '/functions.php';
// authenification script


if ( !empty($_GET['code']) && ($_GET['code']=="FsMktZ" || $_GET['code']=="cYEcHF") ) {
    
    if ( !empty($_GET['id']) ) {
        $id=$_GET['id'];
        echo("<script>location.href = 'facture.php?id=$id';</script>");
    }else{
        $_SESSION["success"] = 2;
        $_SESSION["message"] = "operation n'est pas effectuée";
        echo("<script>location.href = 'factures.php';</script>"); 
    }

}
else{

    $_SESSION["success"] = 2;
    $_SESSION["message"] = "code de securite n'est pas correcte";
    echo("<script>location.href = 'factures.php';</script>"); 

}

//var_dump($_GET);

?>