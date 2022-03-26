<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/database.php';
  include_once '../../models/customer.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $customer = new Customer($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $customer->username = $data->username;
  $customer->email = $data->email;
  $customer->password = $data->password;
  $customer->phone_number = $data->phone_number;

  // Create customer
  if($customer->create()) {
    echo json_encode(
      array('message' => 'Customer Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Customer Not Created')
    );
  }
