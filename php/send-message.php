<?php
require_once "config.php";
$db = new dataSend(); 
$tb = 'messages';

$s_name = htmlspecialchars($_POST['name']);
$s_phone = htmlspecialchars($_POST['phone']);
$s_email = htmlspecialchars($_POST['email']);
$s_msg = htmlspecialchars($_POST['msg']);

if (!empty($s_name) || !empty($s_email) || !empty($s_msg) ) {
  $response =  $db->sendMessage($tb, $s_name, $s_phone, $s_email, $s_msg);
}
echo json_encode($response);

?>