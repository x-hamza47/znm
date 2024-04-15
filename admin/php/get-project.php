<?php 
require_once "crud.php";


$limit = 10;
$page = (isset($_POST['page'])) ? htmlspecialchars($_POST['page']) : 1;
$db = new Database();
$output = "";
$select = "projects.project_id,projects.project_name,projects.project_desc,projects.location,projects.status,categories.name AS c_name,sub_categories.name AS s_name,
(SELECT project_image FROM project_images WHERE project_images.pid = projects.project_id LIMIT 1) AS image";
$join = "LEFT JOIN categories ON projects.category = categories.cid LEFT JOIN sub_categories ON projects.sub_category = sub_categories.id LEFT JOIN project_images ON projects.project_id = project_images.pid";
$groupBy = "projects.project_id";
$response = $db->select("projects",$select,$join,null,"projects.id DESC",$limit,$page,$groupBy);

foreach ($response as $data) {
    $output .= "<tr>
                <td>".((file_exists("../uploads/".$data['image'])) ? '<img src="uploads/'.$data['image'].'"  style="max-width:150px;aspect-ratio:16/9;" class="img-thumbnail img-fluid ">':  '<img src="./uploads/default-150x150.png" style="max-width:150px;aspect-ratio:16/9;" class="img-thumbnail img-fluid ">'). "</td>
                <td >{$data['project_name']}</td>
                <td class='text-justify'>{$data['project_desc']}</td>
                <td class='text-justify fw-bold'>{$data['c_name']}</td>
                <td class='text-justify fw-bold'>{$data['s_name']}</td>
                <td class='text-justify'>{$data['location']}</td>
                <td class='position-relative'>";
        if ($data['status'] == 1) {
            $output .= "<svg class='position-absolute top-50 start-50 translate-middle text-success-500 h-6 w-6 text-success' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0  24 24' stroke-width='2' stroke='currentColor' aria-hidden='true'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                        </svg></td>";
        }else{
            $output .= "<svg class='position-absolute top-50 start-50 translate-middle text-danger h-6 w-6' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' aria-hidden='true'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                        </svg></td>";
        }
           
            $output .= " <td>
                            <button class='btn btn-primary btn-sm open-pro-btn' data-pro-id='{$data['project_id']}' title='Edit'><i class='fa fa-pencil' aria-hidden='true'></i></button>
                            <button class='btn btn-danger btn-sm delete-btn' data-pro-id='{$data['project_id']}' title='Delete' data-bs-toggle='modal' data-bs-target='#deleteDrop'><i class='fa fa-trash' aria-hidden='true'></i></button>
                        </td>
                        </tr>";
}
echo $output;

?>