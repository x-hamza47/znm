<?php

require_once "crud.php";

if(!empty($_POST['d_id'])) {
    $usr_id = urldecode($_POST['d_id']);
    $db = new Database();
    $response = $db->destroy('messages',$usr_id);
} else{
        $response = array(
            'status' => false,
            'message' => 'Deletion Failed.'
        );
}
echo json_encode($response);
    


?>