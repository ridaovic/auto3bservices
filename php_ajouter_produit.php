<?php

// include db connect class
require_once __DIR__ . '/functions.php';

// authenification script

$response = array(); 


if ( !empty($_POST['code']) && ($_GET['code']=="FsMktZ" || $_GET['code']=="cYEcHF") ) {

if ( !empty($_POST['ref']) && !empty($_POST['nom']) && !empty($_POST['qte']) && !empty($_POST['qte_min']) && !empty($_POST['prix']) ) {

    if($_POST['qte'] < $_POST['qte_min']){
        $response["success"] = 2;
        $response["message"] = "La quantité du produit doit être supérieure au minimum";
        
    }  else if($_POST['qte'] <= 0){
        $response["success"] = 2;
        $response["message"] = "La quantité du produit doit être supérieure ou égal à zero";
        
    } else {
    
        $ref=$_POST['ref'];
        $nom=$_POST['nom'];
        $qte=$_POST['qte'];
        $qte_min=$_POST['qte_min'];
        $prix=$_POST['prix'];

         // mysql inserting a new row
        $result = mysql_query("INSERT INTO `produits` (`ref`, `nom`, `prix`, `qte`, `qte_min`) VALUES ('$ref', '$nom', $prix, $qte, $qte_min)");


        if ($result) {    
            $response["success"] = 1;
            $response["message"] = "Opération effectué avec succès";
        }else{
            $response["success"] = 2;
            $response["message"] = "Opération n'est pas effectuée";
        }
    }
    
    
}else{
    if($_POST['qte'] == 0 || $_POST['qte_min'] <= 0 || $_POST['prix'] <= 0 ){
        $response["success"] = 2;
        $response["message"] = "La quantité du produit doit être supérieure ou égal à zero";
    } else {
        $response["success"] = 2;
    $response["message"] = "Tous les champs sont obligatoires";
    }
    

}        


}else{

    $response["success"] = 2;
    $response["message"] = "code de securite n'est pas correcte";

}


echo json_encode($response);

?>