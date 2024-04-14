<?php

require_once "crud.php";
 
$db = new Database();

if(isset($_POST['img_id']) && !empty($_POST['img_id'])){
    $img_name = htmlspecialchars($_POST['img_name']);
    $id = htmlspecialchars($_POST['img_id']);
    $response = $db->destroy('project_images',$id,'id');
    if($response == true){
        unlink("../uploads/".$img_name);
    }
}else{
    $response = array(
        'status' => false,
        'message' => 'Deletion Failed.'
    );
}
echo json_encode($response);
?>