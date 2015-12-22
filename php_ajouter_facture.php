<?php

// include db connect class
require_once __DIR__ . '/functions.php';

// authenification script

$response = array(); 

if ( !empty($_POST['num_fact']) && !empty($_POST['date_fact']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['immatriculation']) && !empty($_POST['marque_voiture']) && !empty($_POST['designation']) && !empty($_POST['qte']) && !empty($_POST['etat_facture']) && !empty($_POST['prix']) && !empty($_POST['montant']) && !empty($_POST['total']) ) {
    
    $num_fact=$_POST['num_fact'];
    $date_fact=$_POST['date_fact'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $immatriculation=$_POST['immatriculation'];

    $rmarque_voituref=$_POST['marque_voiture'];
    $designation=$_POST['designation'];
    $qte=$_POST['qte'];
    $etat_facture=$_POST['etat_facture'];
    $prix=$_POST['prix'];
    $montant=$_POST['montant'];
    $total=$_POST['total'];

     // mysql inserting a new row
    $result = mysql_query("INSERT INTO `factures` (`num_fact`, `date_fact`, `nom`, `prenom`, `immatriculation`, `marque_voiture`, `designation`, `qte`, `etat_facture`, `prix`, `montant`, `total`) 
        VALUES ($num_fact, $date_fact, '$nom', '$prenom', '$immatriculation', '$marque_voiture', '$designation', $qte, '$etat_facture', $prix, $montant, $total)");


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