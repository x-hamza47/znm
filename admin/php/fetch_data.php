<?php

require_once "crud.php";

$limit = 10;
$page = (isset($_POST['page'])) ? htmlspecialchars($_POST['page']) : 1;
$db = new Database();
$output = "";
$response = $db->select("messages","*",null,null,"id DESC",$limit,$page);

$startSerial = ($page - 1) * $limit + 1;

foreach($response as $index => $data) {
    $receive_date = new DateTime($data['receive_date']);
    $formatted_date = $receive_date->format('M d Y');
    $output .= "<tr class='" . ($data['status'] === 'unread' ? 'table-secondary fw-bold' : '') . "'>
             <td>{$startSerial}</td>
             <td>{$data['sender_name']}</td>
             <td>{$data['sender_email']}</td>
             <td>".($data['sender_phone'] === '' ? '--xxx--xxx--':$data['sender_phone'])."</td>
             <td>{$data['receive_time']}</td>
             <td>{$formatted_date}</td>
             <td class='position-relative'>
                 <span class='position-absolute top-50 start-50 translate-middle p-2 " . ($data['status'] == 'unread' ? 'bg-success' : 'bg-dark') . " border border-light rounded-circle'>
                 </span>
             </td>
             <td>
                 <button class='btn btn-primary btn-sm open-msg-btn' data-user-id='{$data['id']}' title='View'><i class='fa fa-eye' aria-hidden='true'></i></button>
                 <button class='btn btn-danger btn-sm delete-btn' data-user-id='{$data['id']}' title='Delete' data-bs-toggle='modal' data-bs-target='#deleteDrop'><i class='fa fa-trash' aria-hidden='true'></i></button>
             </td>
             </tr>";     
$startSerial++; }

echo $output;

?>