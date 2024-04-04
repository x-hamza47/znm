<?php

require_once "crud.php";
if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['category']) && !empty($_POST['category'])) {
    $cat_id = htmlspecialchars($_POST['category']);
    $cat_name = htmlspecialchars($_POST['name']);
    $status = htmlspecialchars($_POST['status']);
    $db = new Database();    
    $queryResult = $db->sql("SELECT * FROM sub_categories WHERE category_id = '{$cat_id}' AND name = '{$cat_name}'");

        if($queryResult) {
            $response = array(
                'status' => false,
                'message' => 'Category already exist!'
            );
        }else{
            $response = $db->createCategory('sub_categories',$cat_id,$cat_name,$status,'category_id','name','status');
        }
}else{
    $response = array(
        'status' => false,
        'message' => 'Please fill out all required fields.',
    );
}
echo json_encode($response);


?>