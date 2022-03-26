<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
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

  // Set ID to UPDATE
  $customer->id = $data->id;
  $customer->username = $data->username;
  $customer->email = $data->email;
  $customer->phone_number = $data->phone_number;

  // Update post
  if($customer->update()) {
    echo json_encode(
      array('message' => 'Customer Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Customer not updated')
    );
  }
