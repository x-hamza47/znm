<?php

require_once "crud.php";
$db = new Database();

$cat_id = htmlspecialchars($_GET['category_id']);

$response = $db->select('sub_categories',"category_id,name",null,"category_id = '{$cat_id}' AND status = '1'","name ASC",null,null);

echo json_encode($response);


?>