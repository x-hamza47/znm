<?php

require_once "crud.php";
if(isset($_POST['name']) && !empty($_POST['name'])) {
    $cid = htmlspecialchars($_POST['cid']);
    $cat_name = htmlspecialchars($_POST['name']);
    $status = htmlspecialchars($_POST['status']);

    $db = new Database();
    $response = $db->updateCategory('categories',$cid,$cat_name,$status);

}else{
    $response = array(
        'status' => false,
        'message' => 'Please fill out all required fields.'
    );
}
echo json_encode($response);


?>