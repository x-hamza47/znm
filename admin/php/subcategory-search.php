<?php
require_once "crud.php";
if(isset($_POST['search'])) {
$search_val = $_POST['search'];
$db = new Database();
$output = "";
$row = "sub_categories.id,sub_categories.name AS s_name,sub_categories.status,categories.name AS c_name";
$join = "LEFT JOIN categories ON sub_categories.category_id = categories.cid";
$where = "WHERE sub_categories.name LIKE '%{$search_val}%' OR categories.name LIKE '%{$search_val}%'";
$response = $db->search('sub_categories',$row,$join,$where,null);

    if ($response != false && !empty($response)) {
        $i = 1;
            foreach($response as  $data) {
                $output .= "<tr>
                        <td>{$i}</td>
                        <td>{$data['s_name']}</td>
                        <td>{$data['c_name']}</td>
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
                
                $output .=  "<td>
                                <button class='btn btn-primary btn-sm open-msg-btn' data-sub-id='{$data['id']}' title='Edit'><i class='fa fa-pencil' aria-hidden='true'></i></button>
                                <button class='btn btn-danger btn-sm delete-btn' data-sub-id='{$data['id']}' title='Delete' data-bs-toggle='modal' data-bs-target='#deleteDrop'><i class='fa fa-trash' aria-hidden='true'></i></button>
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