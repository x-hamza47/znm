<?php

require_once "config.php"; 

$db =  new dataSend();
$output = "";
$select = "projects.project_id,projects.project_name,projects.project_desc,projects.location,projects.status,categories.name AS c_name,sub_categories.name AS s_name,
(SELECT project_image FROM project_images WHERE project_images.pid = projects.project_id LIMIT 1) AS image";
$join = "LEFT JOIN categories ON projects.category = categories.cid LEFT JOIN sub_categories ON projects.sub_category = sub_categories.id LEFT JOIN project_images ON projects.project_id = project_images.pid";
$groupBy = "projects.project_id";
$response = $db->select('projects',$select,$join,"projects.status = '1'","projects.id DESC",null,null,$groupBy);

foreach ($response as $data) {
    $output .= "   <div class='project-bx' data-pro-id='{$data['project_id']}'>
                        <img src='admin/uploads/".$data['image']."' >
                        <div class='project-layer'>
                            <h4>{$data['project_name']}</h4>
                            <p>{$data['c_name']}</p>
                            <p>{$data['location']}</p>
                            </div>
                    </div>";
}

echo $output;

?>