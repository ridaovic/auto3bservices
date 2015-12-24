<?php

// include db connect class
require_once __DIR__ . '/functions.php';

// authenification script

$response = array(); 

echo(count($_POST['designation']));

if (!empty($_POST['vehicule'])  ) {
    $vehicule=$_POST['vehicule'];
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO `factures` (`id`, `created`, `etat`, `id_vehicule`) VALUES ( NULL, CURRENT_TIMESTAMP, '0', $vehicule)");
    $facture=mysql_insert_id();
    if ($result) {
        for ($i=0; $i < count($_POST['designation']); $i++) {

            $designation=$_POST['designation'][$i];
            $qte=$_POST['qte'][$i];
            $prix=$_POST['prix'][$i];

            mysql_query("INSERT INTO `designation` (`id`, `designation`, `qte`, `prix`, `id_facture`) VALUES (NULL, '$designation', $qte, $prix , $facture)");
        }
    }

}
//     $num_fact=$_POST['num_fact'];
//     $date_fact=$_POST['date_fact'];
//     $nom=$_POST['nom'];
//     $prenom=$_POST['prenom'];
//     $immatriculation=$_POST['immatriculation'];
//     $marque_voiture=$_POST['marque_voiture'];
//     $designation=$_POST['designation'];
//     $qte=$_POST['qte'];
//     $etat_facture=$_POST['etat_facture'];
//     $prix=$_POST['prix'];
//     $montant=$_POST['montant'];
//     $total=$_POST['total'];

//      // mysql inserting a new row
//     $result = mysql_query("INSERT INTO `factures` (`num_fact`, `date_fact`, `nom`, `prenom`, `immatriculation`, `marque_voiture`, `designation`, `qte`, `etat_facture`, `prix`, `montant`, `total`) 
//         VALUES ('$num_fact', '$date_fact', '$nom', '$prenom', '$immatriculation', '$marque_voiture', '$designation', '$qte', '$etat_facture', '$prix', '$montant', '$total')");


//    if ($result) {    
//         $response["success"] = 1;
//         $response["message"] = "Opération effectué avec succès";
//     }else{
//         $response["success"] = 2;
//         $response["message"] = "Opération n'est pas effectuée";
//     }
    
// }else{
//     $response["success"] = 2;
//     $response["message"] = "Tous les champs sont obligatoires";
// }        


?>