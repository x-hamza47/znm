<?php
require_once "crud.php";
$new_name = '';
$response = array();
if(isset($_FILES['file']['name']) && is_array($_FILES['file']['name']) && count($_FILES['file']['name']) > 0){
    if(isset($_POST['pro_id']) && !empty($_POST['pro_id'])) {
        $pro_id  = htmlspecialchars($_POST['pro_id']);
        $file_name = '';

        $total = count($_FILES['file']['name']);
        for ($i=0; $i < $total; $i++) { 
            $file_name = $_FILES['file']['name'][$i];
            $extension = pathinfo($file_name,PATHINFO_EXTENSION);
            
            $valid_extensions = array('jpg','png','jpeg');
            
            if(in_array($extension , $valid_extensions)) {
                $new_name = "Project-". mt_rand() . ".". $extension;
                $path = "../uploads/" . $new_name;
                
                $db = new Database();
                $response = $db->uploadImages('project_images',$pro_id,$new_name);
                if($response != false){
                    move_uploaded_file($_FILES['file']['tmp_name'][$i], $path);
                }
                
            }else{
                $response = array(
                    'status' => false,
                    'message' => "This $extension is not allowed, Please select jpg,png or jpeg."
                );
            }
        }
        

    }else{
        $response = array(
            'status' => false,
            'message' => 'Id not found, Kindly Contact your developer.'
        );
    }
    
}else{
    $response = array(
        'status' => false,
        'message' => 'Please upload an image.'
    );
}
echo json_encode($response);

?>