<?php

require_once "crud.php";
$p_id = htmlentities($_POST['pro_id']);
$title = htmlentities($_POST['title']);
$desc = $_POST['description'];
$status = htmlentities($_POST['status']);
$old_img =  htmlentities($_POST['old_img']) ;
$new_name = '';
$response = array();

if(!isset($_FILES['fileUpload']['name']) || empty($_FILES['fileUpload']['name'])){
   $new_name = $old_img;
}else{

    $file_name = htmlentities($_FILES['fileUpload']['name']);
    $file_size = htmlentities($_FILES['fileUpload']['size']);
    $file_tmp = htmlentities($_FILES['fileUpload']['tmp_name']);
    $file_type = htmlentities($_FILES['fileUpload']['type']);

    $file_ext_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext_parts));
    $extensions = array("jpeg","png","jpg");

    if(in_array($file_ext, $extensions) == false) {
        $response = array(
            "status" => false,
            "message" => "This [$file_ext] ext file is not allowed, please choose JPEG,PNG or JPG."
        );
 
    }elseif ($file_size > 2097152 ) {
        $response = array(
            'status' => false,
            'message' => 'File size must be 2MB or less.'
        );
  
    }else{
        $new_name = "Project-".time()."-".basename($file_name);
        $target = '../uploads/'.$new_name;
          if (file_exists("../uploads")) {    
            if(move_uploaded_file($file_tmp,$target)){
                $response = array(
                'status' => true,
                'message' => []
                );
                unlink("../uploads/".$old_img);
            }else{
                $response = array(
                    'status' => false,
                    'message' => 'uploading failed.'
                );
            }
        }else{
            $response = array(
                'status' => false,
                'message' => 'directory not found.'
            );
        }
    } 
}
$db = new Database();
$res = $db->update('projects',$p_id,$title,$desc,$new_name,$status);
echo json_encode($res);

?>