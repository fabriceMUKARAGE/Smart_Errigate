<?php 

require('../model/sensors.php');

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
                <th>User ID</th>
                <th>Email</th>
                <th>Farm</th>
                <th>Sensor Name</th>
                <th>location</th>
                <th>type</th>
                <th>Action</th>
    
            </tr>
        </thead>
        <tbody>
        ';
        foreach($data as $row){
            $output .= '<tr class="text-center text-secondary">
            <td>'.$row['id'].'</td>
            <td>'.$row['user_id'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['farm'].'</td>
            <td>'.$row['sensor_name'].'</td>
            <td>'.$row['location'].'</td>
            <td>'.$row['type'].'</td>
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
        echo '<h3 class="text-center text-secondary mt-5">:( No sensor present in the database )</h3>';
    }
}

//insert a sensor
if(isset($_POST['action']) && $_POST['action'] == "insert"){
    $user_id = $_POST['user_id'];
    $sensor_name = $_POST['sensor_name'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $db->insert($user_id, $sensor_name,$location,$type); 
}

if(isset($_POST['edit_id'])){
    $id = $_POST['edit_id'];

    $row = $db->getSensorBiId($id);
    echo json_encode($row);
}

if(isset($_POST['action']) && $_POST['action'] == 'update'){
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $sensor_name = $_POST['sensor_name'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $db->update($id,$user_id, $sensor_name, $location, $type);
}



if(isset($_POST['del_id'])){
    $id = $_POST['del_id'];

    $db->delete($id);
}

if(isset($_POST['info_id'])){
    $id = $_POST['info_id'];
    $row = $db->getSensorBiId($id);
    echo json_encode($row);
}


if(isset($_GET['export']) && $_GET['export'] == "excel"){
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=sensors.xls");
    header("pragma: no-cache");
    header("Expires: 0");

    $data = $db->read();
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>User ID</th><th>Email</th><th>Farm</th><th>Sensor name</th><th>Location</th><th>Type</th>';

    foreach($data as $row){
        echo '<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['user_id'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['farm'].'</td>
        <td>'.$row['sensor_name'].'</td>
        <td>'.$row['location'].'</td>
        <td>'.$row['type'].'</td>
        </tr>';
    }
    echo '</table>';
}

?>