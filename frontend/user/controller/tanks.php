<?php 

require('../model/model.php');
$id = $_GET['id'];

$db = new Database();

if(isset($_POST['action']) && $_POST['action']== "tank"){
    // $output = '';
    $data = $db->readTanks($id);
   //  print_r($data);
    if($db->totalTanksRowCount($id)>0){ 
        $count = 0;
        $newRow = true;

        foreach($data as $row){
            $data_id = $row['id'];
            $tank_name = $row['tank_name'];
            $name = str_replace(' ', '', $tank_name);
            // $name = trim($row['tank_name'], " ");
            if($newRow){
                echo '<div class="row">';
                $newRow = false;
            }
           
            echo '<div class="col-lg-4 mb-4">
            <div class="card h-100">
               <h4 class="card-header">'.$row['tank_name'].'</h4>
               <div class="card-img">
                  <img class="img-fluid" src="images/water-tanks.jpg" alt="" />
               </div>
               <div class="card-body">
                  <div class="card-text">LEVEL: '.$row['level'].' <br> Refill: '.$row['refill'].' <br> Rate: '.$row['rate'].'
                  </div>
               </div>
               <div class="card-footer">
               <a href="../controller/tanks.php?id='.$id.'&tank_id='.$data_id.'&tank_name='.$row['tank_name'].'"  id="'.$name.'" class="btn btn-primary text-capitalize '.$row['is_pump_open'].'" onclick="myFunction('.$data_id.')">valve '.$row['is_pump_open'].'</a>
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
        echo '<h3 class="text-center text-secondary mt-5">:( No Tanks present in the database )</h3>';
    }

}

if(isset($_GET['tank_id'])){
    $tank_id = $_GET['tank_id'];
    // $str = 'This is a simple piece of text.';
    // $new_str = str_replace(' ', '', $str);
    $tank_name = $_GET['tank_name'];
    $name = str_replace(' ', '', $tank_name);
    // echo "".$bed_id;
    $db->tankValve($tank_id);
    header( 'Location: ../view/tanks.php?id='.$id.'#'.$name.'');
    // return $data;
}

?>