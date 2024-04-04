<?php
require_once "crud.php";
if(isset($_POST['search'])) {
$search_val = $_POST['search'];
$db = new Database();
$output = "";
$response = $db->searchCategory('categories',$search_val,'name');

    if ($response != false && !empty($response)) {
        $i = 1;
            foreach($response as  $data) {
                $output .= "<tr>
                        <td>{$i}</td>
                        <td>{$data['name']}</td>
                        <td class='position-relative'>
                            <span class='position-absolute top-50 start-50 translate-middle p-2 " .($data['status'] == '1' ? 'bg-success' : 'bg-dark') . " border border-light rounded-circle'>
                            </span>
                        </td>
                        <td>
                            <button class='btn btn-primary btn-sm open-msg-btn' data-cat-id='{$data['cid']}' title='Edit'><i class='fa fa-pencil' aria-hidden='true'></i></button>
                            <button class='btn btn-danger btn-sm delete-btn' data-cat-id='{$data['cid']}' title='Delete' data-bs-toggle='modal' data-bs-target='#deleteDrop'><i class='fa fa-trash' aria-hidden='true'></i></button>
                        </td>
                        </tr>";     
                $i++;
            }
            
            echo $output;
    }else{
        echo "<h2 class='text-warning m-4 fw-bolder w-100'>No Record found.</h2>";
    }
}else{
    echo 0;
}
?>