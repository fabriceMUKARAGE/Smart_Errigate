<?php 

require('../model/tanks.php');

$db = new Database();

if(isset($_POST['action']) && $_POST['action']== "view"){
    $output = '';
    $data = $db->read();
   //  print_r($data);
    if($db->totalRowCount()>0){ 
        $output .= '<table class="table table-striped table-sm table-bordered">
        <thead>
            <tr class="text-center">
                
                <th>User ID</th>
                <th>Tank name</th>
                <th>level</th>
                <th>refill</th>
                <th>Rate</th>
                <th>is_pump_open</th>
            </tr>
        </thead>
        <tbody>
        ';
        foreach($data as $row){
            $output .= '<tr class="text-center text-secondary">
            <td>'.$row['id'].'</td>
            <td>'.$row['user_id'].'</td>
            <td>'.$row['level'].'</td>
            <td>'.$row['refill'].'</td>
            <td>'.$row['rate'].'</td>
            <td>'.$row['is_pump_open'].'</td>
            <td>
                <a href="#" title="View Details" class="text-success infoBtn" id="'.$row['id'].'">
                <i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;


                <a href="#" title="Edit" class="text-primary editBtn" data-toggle="modal" data-target="#editModal" id="'.$row['id'].'">
                <i class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;


                <a href="#" title="Delete" class="text-danger delBtn" id="'.$row['id'].'">
                <i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;&nbsp;

            </td></tr>';
        }
        $output .='</tbody></table>';
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary mt-5">:( no any user present in the database )</h3>';
    }
}

//insert a customer
if(isset($_POST['action']) && $_POST['action'] == "insert"){
    $user_id = $_POST['user_id'];
    $tank_name = $_POST['tank_name'];
    $level = $_POST['level'];
    $refill = md5($refill);
    $rate = $_POST['rate'];
    $is_pump_open = $_POST['is_pump_open'];   

    $db->insert($user_id, $tank_name, $level, $refill, $rate, $is_pump_open); 
}

if(isset($_POST['edit_id'])){
    $id = $_POST['edit_id'];

    $row = $db->getUserBiId($id);
    echo json_encode($row);
}

if(isset($_POST['action']) && $_POST['action'] == 'update'){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $credit = $_POST['credit'];
    $farm = $_POST['farm'];

    $db->update($user_id, $tank_name, $level, $refill, $rate, $is_pump_open);
}

if(isset($_POST['del_id'])){
    $id = $_POST['del_id'];

    $db->delete($id);
}

if(isset($_POST['info_id'])){
    $id = $_POST['info_id'];
    $row = $db->getUserBiId($id);
    echo json_encode($row);
}


if(isset($_GET['export']) && $_GET['export'] == "excel"){
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=users.xls");
    header("pragma: no-cache");
    header("Expires: 0");

    $data = $db->read();
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Username</th><th>Email</th><th>Phone number</th><th>Credit</th><th>Farms</th>';

    foreach($data as $row){
        echo '<tr>
        <td>'.$row['user_name'].'</td>
        <td>'.$row['tank_name'].'</td>
        <td>'.$row['level'].'</td>
        <td>'.$row['refill'].'</td>
        <td>'.$row['rate'].'</td>
        <td>'.$row['is_pump_open'].'</td>
        </tr>';
    }
    echo '</table>';
}

?>