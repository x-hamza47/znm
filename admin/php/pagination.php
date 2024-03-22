<?php
require_once "crud.php";
if (isset($_POST['tb'])){
    $tb = htmlentities($_POST['tb']);
}else{
    $response = "Database not found";
}

$limit = 6;
$page = (isset($_POST['page'])) ? htmlspecialchars($_POST['page']) : 1;
$db = new Database();
$response = $db->pagination($tb,null,null,$limit,$page);
echo $response;


?>