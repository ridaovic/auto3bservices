<?php

// include db connect class
require_once __DIR__ . '/functions.php';

// authenification script

$response = array(); 

if ( !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mat']) && !empty($_POST['marque']) && !empty($_POST['ass']) && !empty($_POST['exp']) ) {
    
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $mat=$_POST['mat'];
        $marque=$_POST['marque'];
        $ass=$_POST['ass'];
        $exp=$_POST['exp'];
        $de=$_POST['de'];
        $ds=$_POST['ds'];

        // mysql inserting a new row
        $result = mysql_query("INSERT INTO `vehicules` (`id`, `nom`, `prenom`, `immatriculation`, `marque`, `expere`, `assurance`, `date_entree`, `date_sortie`) 
            VALUES (NULL, '$nom', '$prenom', '$mat', '$marque', '$exp', '$ass', '$de', '$ds')");


        if ($result) {    
            $response["success"] = 1;
            $response["message"] = "Opération effectué avec succès";
        }else{
            $response["success"] = 2;
            $response["message"] = "Opération n'est pas effectuée";
        }
}else{
    $response["success"] = 2;
    $response["message"] = "Tous les champs sont obligatoires";
}        

echo json_encode($response);

?>