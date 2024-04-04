<?php

require_once "crud.php";

if(!empty($_POST['cid'])) {
    $usr_id = htmlspecialchars($_POST['cid']);
    $col = "cid";
    $db = new Database();
    $response = $db->deleteCategory('categories',$usr_id,$col);
} else{
        $response = array(
            'status' => false,
            'message' => 'Deletion Failed.'
        );
}
echo json_encode($response);
    


?>