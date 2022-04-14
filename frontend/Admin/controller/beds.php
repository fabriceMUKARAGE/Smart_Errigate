<?php 

require('../model/manage-users.php');

$db = new Database();

if(isset($_POST['action']) && $_POST['action']== "view"){
    $output = '';
    $data = $db->read();
   //  print_r($data);
    if($db->totalRowCount()>0){ 
        $output .= '<table class="table table-striped table-sm table-bordered">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Phone</th>
                <th>Credit</th>
                <th>Farms</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        ';
        foreach($data as $row){
            $output .= '<tr class="text-center text-secondary">
            <td>'.$row['id'].'</td>
            <td>'.$row['username'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['phone_number'].'</td>
            <td>'.$row['credit'].'</td>
            <td>'.$row['farm'].'</td>
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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $phone_number = $_POST['phone_number'];
    $credit = $_POST['credit'];
    $farm = $_POST['farm'];

    $db->insert($username, $email, $password, $phone_number, $credit, $farm); 
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

    $db->update($id,$username, $email, $phone_number, $credit, $farm);
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
        <td>'.$row['id'].'</td>
        <td>'.$row['username'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['phone_number'].'</td>
        <td>'.$row['credit'].'</td>
        <td>'.$row['farm'].'</td>
        </tr>';
    }
    echo '</table>';
}

?>