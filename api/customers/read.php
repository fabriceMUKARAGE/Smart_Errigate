<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/database.php';
  include_once '../../models/customer.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate category object
  $customer = new Customer($db);

  // Category read query
  $result = $customer->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any customers
  if($num > 0) {
        // Cus array
        $cus_arr = array();
        $cus_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $cus_item = array(
            'id' => $id,
            'username' => $username,
            'email' => $email,
            'phone_number' => $phone_number
          );

          // Push to "data"
          array_push($cus_arr['data'], $cus_item);
        }

        // Turn to JSON & output
        echo json_encode($cus_arr);

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No Customers Found')
        );
  }
