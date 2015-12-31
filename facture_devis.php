<?php 
// include db connect class
require_once __DIR__ . '/functions.php';

$result = mysql_query("SELECT * FROM vehicules") or die(mysql_error());

$response = array();

while($row = mysql_fetch_array($result)){
$response['id'] = $row['id'];
$response['name'] = $row['immatriculation'];
$data[]=$response;
}


echo json_encode($data);
 ?>