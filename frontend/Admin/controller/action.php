<?php 

require('model.php');

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

?>