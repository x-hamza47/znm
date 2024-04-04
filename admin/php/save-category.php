<?php

require_once "crud.php";
if(isset($_POST['name']) && !empty($_POST['name'])) {
    $cat_name = htmlspecialchars($_POST['name']);
    $status = htmlspecialchars($_POST['status']);

    $category_id = 'cid-' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    $db = new Database();
    $queryResult = $db->sql("SELECT * FROM categories WHERE name = '{$cat_name}'");
    if($queryResult) {
        $response = array(
            'status' => false,
            'message' => 'Category already exist!'
        );
    }else{
        $response = $db->createCategory('categories',$category_id,$cat_name,$status,'cid','name','status');
    }

}else{
    $response = array(
        'status' => false,
        'message' => 'Please fill out all required fields.'
    );
}
echo json_encode($response);


?>