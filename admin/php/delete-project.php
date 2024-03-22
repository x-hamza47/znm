<?php

require_once "crud.php";
$response2 = array();
if(!empty($_POST['p_id'])) {
    $pro_id = urldecode($_POST['p_id']);
    $db = new Database();

    $sql = "SELECT project_image FROM projects WHERE id = ?";
    $query = $db->prepare($sql);
    $query->bind_param("i",$pro_id);
    $query->execute();
    $result = $query->get_result();
    if($result->num_rows > 0) {
        $img_row = $result->fetch_assoc();
        $img_filename = $img_row['project_image'];
        $img_path = "../uploads/" . $img_filename;

        if(file_exists($img_path)) {
            if(unlink($img_path)) {
                $response = array(
                    'status' => true,
                    'message' => 'unlinked'
                );

            }else{
              return false;
            }
        }else{
            $response = array(
                'status' => false,
                'message' => 'file not found'
            );
        }
    }else{
        $response = array(
            'status' => false,
            'message' => 'not found in db'
        );
    }


} else{
        $response = array(
            'status' => false,
            'message' => 'Deletion Failed.'
        );
}
$response2 = $db->destroy('projects',$pro_id);
echo json_encode($response2);
    


?>