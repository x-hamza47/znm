<?php

require_once "crud.php";
$title = htmlentities($_POST['title']);
$desc = $_POST['description'];
$cid = htmlspecialchars($_POST['category']);
$sid = htmlspecialchars($_POST['sub_category']);
$location = htmlentities($_POST['location']);
$status = htmlentities($_POST['status']);

$response = array();


$db = new Database();
$response = $db->uploadProject('projects', $title, $desc, $cid, $sid, $location, $status);

echo json_encode($response);


?>