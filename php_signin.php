<?php session_start();

// include db connect class
require_once __DIR__ . '/functions.php';



// authenification script

$response = array(); 
                            
if (!empty($_POST['username']) && !empty($_POST['password'])) {

    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $result = mysql_query("SELECT * FROM users where username='$username' and password='$password'") or die(mysql_error());

    
    if (mysql_num_rows($result) > 0) {
        
        $response["success"] = 1;
        $response["message"] = "access success.";
        $result = mysql_fetch_array($result);
        $_SESSION['id']=$result['id'];
    }else{
        $response["success"] = 2;
        $response["message"] = "Identifiant ou le mot de passe est incorrect";
    }
    
}else{

    $response["success"] = 2;
    $response["message"] = "Tous les champs sont obligatoires";

}        

echo json_encode($response);

?>
