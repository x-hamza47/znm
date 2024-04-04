<?php
require_once "crud.php";
if(isset($_POST['search'])) {
$search_val = $_POST['search'];
$db = new Database();
$output = "";
$col_1 = "sender_name";
$col_2 = "sender_email";
$search = "WHERE sender_name LIKE '%{$search_val}%' OR sender_email LIKE '%{$search_val}%'";
$response = $db->search('messages',"*",null,$search,null);

 if ($response != false && !empty($response)) {
    $i = 1;
        foreach($response as  $data) {
            $receive_date = new DateTime($data['receive_date']);
            $formatted_date = $receive_date->format('M d Y');
            $output .= "<tr class='" . ($data['status'] === 'unread' ? 'table-secondary fw-bold' : '') . "'>
                    <td>{$i}</td>
                    <td>{$data['sender_name']}</td>
                    <td>{$data['sender_email']}</td>
                    <td>".($data['sender_phone'] === '' ? '--xxx--xxx--':$data['sender_phone'])."</td>
                    <td>{$data['receive_time']}</td>
                    <td>{$formatted_date}</td>
                    <td class='position-relative'>
                        <span class='position-absolute top-50 start-50 translate-middle p-2 " .($data['status'] == 'unread' ? 'bg-success' : 'bg-dark') . " border border-light rounded-circle'>
                        </span>
                    </td>
                    <td>
                        <button class='btn btn-primary btn-sm open-msg-btn' data-user-id='{$data['id']}' title='View'><i class='fa fa-eye' aria-hidden='true'></i></button>
                        <button class='btn btn-danger btn-sm delete-btn' data-user-id='{$data['id']}' title='Delete' data-bs-toggle='modal' data-bs-target='#deleteDrop'><i class='fa fa-trash' aria-hidden='true'></i></button>
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