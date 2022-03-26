<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/database.php';
  include_once '../../models/customer.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog category object
  $customer = new Customer($db);

  // Get ID
  $customer->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get customer
  $customer->read_single();

  // Create array
  $customer_arr = array(
    'id' => $customer->id,
    'username' => $customer->username,
    'email' => $customer->email,
    'phone_number' => $customer->phone_number
  );

  // Make JSON
  print_r(json_encode($customer_arr));
