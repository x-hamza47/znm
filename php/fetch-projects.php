<?php

require_once "../admin/php/crud.php";

$db =  new Database();
$output = "";
$response = $db->select('projects',"*",null,"status = '1'","id DESC",null,null);

foreach ($response as $data) {
    $output .= "<div class='swiper-slide project-card'>
                    <div class='project-card-content'>
                        <div class='image'>
                        ".(file_exists("../admin/uploads/".$data['project_image']) ?'<img src="admin/uploads/'.$data['project_image'].'" class="img-thumbnail">':  '<img src="admin/uploads/default-150x150.png" class="img-thumbnail">'). "
                        </div>
                    <div class='detail-bx'>
                        <h5>{$data['project_name']}</h5>
                        <div id='d-bx'>{$data['project_desc']}</div>
                    </div> 
                    </div>
                </div>";
}

echo $output;

?>