<?php

// include db connect class
require_once __DIR__ . '/functions.php';

// authenification script

$response = array(); 

if ( !empty($_POST['ref']) && !empty($_POST['nom']) && !empty($_POST['qte']) && !empty($_POST['qte_min']) && !empty($_POST['prix']) ) {

    $ref=$_POST['ref'];
    $nom=$_POST['nom'];
    $qte=$_POST['qte'];
    $qte_min=$_POST['qte_min'];
    $prix=$_POST['prix'];
    
     // mysql inserting a new row
    $result = mysql_query("INSERT INTO `produits` (`ref`, `nom`, `prix`, `qte`, `qte_min`) VALUES ('$ref', '$nom', $prix, $qte, $qte_min)");

    
    if ($result) {    
        $response["success"] = 1;
        $response["message"] = "opération effectué avec succès";
    }else{
        $response["success"] = 2;
        $response["message"] = "opération n'est pas effectuée";
    }
    
}else{

    $response["success"] = 2;
    $response["message"] = "tous les champs sont obligatoires";

}        

echo json_encode($response);

?>