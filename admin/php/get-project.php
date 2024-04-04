<?php
require_once "crud.php";

$limit = 10;
$page = (isset($_POST['page'])) ? htmlspecialchars($_POST['page']) : 1;
$db = new Database();
$output = "";
$response = $db->select("projects","*",null,null,"id DESC",$limit,$page);

foreach ($response as $data) {
    $output .= "<tr>
                <td>".(file_exists("../uploads/".$data['project_image']) ?'<img src="uploads/'.$data['project_image'].'" class="img-thumbnail">':  '<img src="uploads/default-150x150.png" class="img-thumbnail">'). "</td>
                <td class='fw-bold'>{$data['project_name']}</td>
                <td class='text-justify'>{$data['project_desc']}</td>
                <td>";
        if ($data['status'] == 1) {
            $output .= "<svg class='text-success-500 h-6 w-6 text-success' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' aria-hidden='true'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                        </svg></td>";
        }else{
            $output .= "<svg class='text-danger h-6 w-6' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' aria-hidden='true'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                        </svg></td>";
        }
           
            $output .= " <td>
                            <button class='btn btn-primary btn-sm open-pro-btn' data-pro-id='{$data['id']}' title='Edit'><i class='fa fa-pencil' aria-hidden='true'></i></button>
                            <button class='btn btn-danger btn-sm delete-btn' data-pro-id='{$data['id']}' title='Delete' data-bs-toggle='modal' data-bs-target='#deleteDrop'><i class='fa fa-trash' aria-hidden='true'></i></button>
                        </td>
                        </tr>";
}
echo $output;

?>