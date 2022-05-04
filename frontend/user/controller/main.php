<?php 

require('../model/model.php');
$id = $_GET['id'];

$db = new Database();

if(isset($_POST['action']) && $_POST['action']== "bed"){
    $output = '';
    $data = $db->readFeaturedBeds($id);
   //  print_r($data);
    if($db->totalRowCount($id)>0){ 
        foreach($data as $row){
        $data_id = $row['id'];
        $output .=  '<div class="col-lg-4 mb-4">
        <div class="card h-100">
           <h4 class="card-header">'.$row['bed_name'].'</h4>
           <div class="card-img">
              <img class="img-fluid" src="images/beds.png" alt="" />
           </div>
           <div class="card-body">
              <div class="card-text">Soil humidity:'.$row['humidity'].'<br> Soil temperature: '.$row['temperature']. "°C".' <br> PH: '.$row['pH'].' <br> Nitrogen: '.$row['nitrogen'].' <br> Phosphorus: '.$row['phosphorous'].'
                 <br> Potassium: '.$row['potassium'].' <br> Water used(24h): '.$row['water_used'].'
              </div>
           </div>
           <div class="card-footer">
              <a href="../view/beds.php?id='.$id.'" class="btn btn-primary">Open Valve</a>
           </div>
        </div>
     </div>';
        }
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary mt-5">:( No Beds present in the database )</h3>';
    }

}

if(isset($_POST['action']) && $_POST['action']== "weather"){

    $weather_output = '';
    $farm_data = $db->readFarmWeather($id);
   //  print_r($data);
    if($db->totalWeatherRowCount($id)>0){ 
        $weather_output .=  '<div class="col-lg-6">
        <h2>Farm Weather</h2>
        <p>Read the farm weather and choose the best settings for automated irrigation</p>
        <h5>Our smart approach</h5>
        <ul>
           <li>Temperature: '.$farm_data['temperature']. "°C".'</li>
           <li>Relative Humidity: '.$farm_data['humidity'].'</li>
           <li>Wind Speed: '.$farm_data['wind_speed'].'</li>
           <li>Wind Direction: '.$farm_data['wind_direction'].'</li>
           <li>Rainfall: '.$farm_data['rainfall'].'</li>
           <li>Solar Radiation: '.$farm_data['solar_radiation'].'</li>
        </ul>
        <p>Read the farm weather data recorded over a period of time and make the right irrigation decisions for your crops. Open valves to water farm crops on a sunny day and
           close valves on a rainy day to prevent leaching. 
        </p>
        </div>
        <div class="col-lg-6">
        <img class="img-fluid rounded" src="images/farm-weather.png" alt="" />
        </div>';
        echo $weather_output;
    }
    else{
        echo '<h3 class="text-center text-secondary mt-5">:( No records of farm weather sent to database )</h3>';
    }
}

if(isset($_POST['action']) && $_POST['action']== "tank"){
    $tank_output = '';
    $tank_data = $db->readFeaturedTanks($id);
   //  print_r($data);
    if($db->totalRowCount($id)>0){ 
        foreach($tank_data as $tank_row){
        $tank_data_id = $tank_row['id'];
        $tank_output .=  '<div class="col-lg-4 mb-4">
        <div class="card h-100">
           <h4 class="card-header">'.$tank_row['tank_name'].'</h4>
           <div class="card-img">
              <img class="img-fluid" src="images/water-tanks.jpg" alt="" />
           </div>
           <div class="card-body">
              <div class="card-text">LEVEL: '.$tank_row['level'].' <br> Refill: '.$tank_row['refill'].' <br> Rate: '.$tank_row['rate'].'
              </div>
           </div>
           <div class="card-footer">
           <a href="../view/tanks.php?id='.$id.'" class="btn btn-primary">Open Valve</a>
           </div>
        </div>
     </div>';
        }
        echo $tank_output;
    }else{
        echo '<h3 class="text-center text-secondary mt-5">:( No Tanks present in the database )</h3>';
    }

}

?>