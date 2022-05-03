<?php 

require('../model/model.php');
$id = $_GET['id'];

$db = new Database();

if(isset($_POST['action']) && $_POST['action']== "view"){
    $output = '';
    $data = $db->readSensors($id);
   //  print_r($data);
    if($db->totalRowCount($id)>0){ 
        $output .= '<table class="table table-striped  table-bordered">
        <thead>
            <tr class="text-center">            
                <th scope="col">#</th>
                <th scope="col">Name of Sensor</th>
                <th scope="col">Location</th>
                <th scope="col">Type of Sensor</th>
                <th scope="col">Value Recorded</th>
            </tr>
        </thead>
        <tbody>
        ';
        foreach($data as $row){
            $output .= ' <tbody>
        <tr class="text-center">
            <th scope="row">'.$row['id'].'</th>
            <td>'.$row['sensor_name'].'</td>
            <td>'.$row['location'].'</td>
            <td>'.$row['type'].'</td>
            <td>'.$row['value_recorded'].'</td>
         </tr>';
        }
        $output .='</tbody></table>';
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary mt-5">:( No sensor present in the database )</h3>';
    }
}


// if(isset($_GET['export']) && $_GET['export'] == "excel"){
//     header("Content-Type: application/xls");
//     header("Content-Disposition: attachment; filename=sensors.xls");
//     header("pragma: no-cache");
//     header("Expires: 0");

//     $data = $db->read();
//     echo '<table border="1">';
//     echo '<tr><th>ID</th><th>User ID</th><th>Email</th><th>Farm</th><th>Sensor name</th><th>Location</th><th>Type</th>';

//     foreach($data as $row){
//         echo '<tr>
//         <td>'.$row['id'].'</td>
//         <td>'.$row['user_id'].'</td>
//         <td>'.$row['email'].'</td>
//         <td>'.$row['farm'].'</td>
//         <td>'.$row['sensor_name'].'</td>
//         <td>'.$row['location'].'</td>
//         <td>'.$row['type'].'</td>
//         </tr>';
//     }
//     echo '</table>';
// }

?>