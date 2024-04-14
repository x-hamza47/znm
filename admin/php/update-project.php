<?php

require_once "crud.php";
$p_id = htmlentities($_POST['pro_id']);
$title = htmlentities($_POST['title']);
$desc = $_POST['description'];
$cid = htmlspecialchars($_POST['category']);
$sid = htmlspecialchars($_POST['sub_category']);
$location = htmlentities($_POST['location']);
$status = htmlentities($_POST['status']);

$db = new Database();
$res = $db->update('projects',$p_id,$title,$desc,$cid,$sid,$location,$status);
echo json_encode($res);

?>