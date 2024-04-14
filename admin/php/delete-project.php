<?php

require_once "crud.php"; 
$response2 = array();
if(!empty($_POST['p_id'])) {
    $pro_id = urldecode($_POST['p_id']);
    $db = new Database();

    $sql = "SELECT project_image FROM project_images WHERE pid = ?";
    $query = $db->prepare($sql);
    $query->bind_param("s",$pro_id);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $img_filename = $row['project_image'];
            $img_path = "../uploads/" . $img_filename;

            if (file_exists($img_path)) {
                if (unlink($img_path)) {
                    $response[] = $db->destroy('project_images', $pro_id, 'pid');
                } else {
                    $response[] = array(
                        'filename' => $img_filename,
                        'status' => false,
                        'message' => 'Failed to unlink the image file.'
                    );
                }
            } else {
                $response[] = $db->destroy('project_images', $pro_id, 'pid');
            }
        }
    } else {
        // If there are no images associated with the project
        $response = array(
            'status' => false,
            'message' => 'No image files found for the provided project ID.'
        );
    }


} else{
        $response = array(
            'status' => false,
            'message' => 'Deletion Failed.'
        );
}
$response2 = $db->destroy('projects',$pro_id,'project_id');
echo json_encode($response2);
    


?>