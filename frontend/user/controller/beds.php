<?php 

require('../model/model.php');


$id = $_GET['id'];

$db = new Database();

if(isset($_POST['action']) && $_POST['action']== "bed"){
    // $output = '';
    $data = $db->readBeds($id);
   //  print_r($data);
    if($db->totalBedsRowCount($id)>0){ 
        $count = 0;
        $newRow = true;

        foreach($data as $row){
            $data_id = $row['id'];
            // $valve = $row['is_valve_open'];
            if($newRow){
                echo '<div class="row">';
                $newRow = false;
            }
           
            echo '<div class="col-lg-4 mb-4">
            <div class="card h-100">
               <h4 class="card-header">'.$row['bed_name'].'</h4>
               <div class="card-img">
                  <img class="img-fluid" src="images/beds.png" alt="" />
               </div>
               <div class="card-body">
                  <div class="card-text">Soil humidity: '.$row['humidity'].'<br> Soil temperature: '.$row['temperature']. "°C".' <br> PH: '.$row['pH'].' <br> Nitrogen: '.$row['nitrogen'].' <br> Phosphorus: '.$row['phosphorous'].'
                     <br> Potassium: '.$row['potassium'].' <br> Water used(24h): '.$row['water_used'].'
                  </div>
               </div>
               <div class="card-footer">
               <a href="../controller/beds.php?id='.$id.'&bed_id='.$data_id.'"  id="'.$data_id.'" class="btn btn-primary text-capitalize '.$row['is_valve_open'].'" onclick="myFunction('.$data_id.')">valve '.$row['is_valve_open'].'</a>
               </div>
            </div>
         </div>';
        
        $count++;

        if ($count == 3){
            echo '</div>';
            $newRow = true;
            $count = 0;
        }
        }
        // echo $output;
    }else{
        echo '<h3 class="text-center text-secondary mt-5">:( No Beds present in the database )</h3>';
    }

}



if(isset($_GET['bed_id'])){
    $bed_id = $_GET['bed_id'];
    // echo "".$bed_id;
    $db->bedValve($bed_id);
    header( 'Location: ../view/beds.php?id='.$id.'');
    // return $data;
}

// $data = $db->bedValve($bed_id);

?>