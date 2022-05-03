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

?>