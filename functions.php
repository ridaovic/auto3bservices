<?php 
// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();


function encrypt($data) {
    $key = "bigdig";  // Clé de 8 caractères max
    $data = serialize($data);
    $td = mcrypt_module_open(MCRYPT_DES,"",MCRYPT_MODE_ECB,"");
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND); 
    mcrypt_generic_init($td,$key,$iv);
    $data = base64_encode(mcrypt_generic($td, '!'.$data));
    mcrypt_generic_deinit($td);
    return $data; 
}
 
function decrypt($data) {
    $key = "bigdig"; 
    $td = mcrypt_module_open(MCRYPT_DES,"",MCRYPT_MODE_ECB,""); 
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND); 
    mcrypt_generic_init($td,$key,$iv); 
    $data = mdecrypt_generic($td, base64_decode($data));
    mcrypt_generic_deinit($td); 
 
    if (substr($data,0,1) != '!') 
        return false; 
 
    $data = substr($data,1,strlen($data)-1); 
    return unserialize($data); 
}

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

function generer_token($nom = ''){
    session_start();
    $token = uniqid(rand(), true);
    $_SESSION[$nom.'_token'] = $token;
    $_SESSION[$nom.'_token_time'] = time();
    return $token;
}

function verifier_token($temps, $referer, $nom = ''){
session_start();
if(isset($_SESSION[$nom.'_token']) && isset($_SESSION[$nom.'_token_time']) && (isset($_POST['token']) || isset($_GET['token'])))
    if($_SESSION[$nom.'_token'] == $_POST['token'] || $_SESSION[$nom.'_token'] == $_GET['token'])
        if($_SESSION[$nom.'_token_time'] >= (time() - $temps))
            if($_SERVER['HTTP_REFERER'] == $referer)
                return true;
return false;
}


function getAllProducts()
{
     $result = mysql_query("SELECT * FROM produits ") or die(mysql_error());
     $produits = array();
     while($row = mysql_fetch_array($result))
        $produits[] = $row;   
    return $produits;
}

function getProduct($ref)
{
     $result = mysql_query("SELECT * FROM produits where ref='$ref' ") or die(mysql_error());
     $produit = mysql_fetch_array($result);
    return $produit;
}

function getAllFactures()
{
     $result = mysql_query("SELECT * FROM factures ") or die(mysql_error());
     $factures = array();
     while($row = mysql_fetch_array($result))
        $factures[] = $row;   
    return $factures;
}

function getFacture($num_fact)
{
     $result = mysql_query("SELECT * FROM factures where num_fact='$num_fact' ") or die(mysql_error());
     $facture = mysql_fetch_array($result);
    return $facture;
}
function isMinqteSupQte($ref)
{
     $produit = getProduct($ref);
     if($produit['qte_min'] >= $produit['qte'])
         return true;
        else
         return false;
}

function getNotifProducts()
{   
    $result = mysql_query("SELECT count(*) FROM produits WHERE qte_min>=qte") or die(mysql_error());
    $count = mysql_fetch_array($result);
    return $count[0];
}


function getAllProductsNotif()
{
     $result = mysql_query("SELECT * FROM produits WHERE qte_min>=qte") or die(mysql_error());
     $produits = array();
     while($row = mysql_fetch_array($result))
        $produits[] = $row;   
    return $produits;
}


function messageFlash()
{
     
}

//  les fonction pour table vehicule

function getAllVehicules()
{
     $result = mysql_query("SELECT * FROM vehicules ") or die(mysql_error());
     $vihecules = array();
     while($row = mysql_fetch_array($result))
        $vihecules[] = $row;   
    return $vihecules;
}

?>
