<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "errigate";

// // Create connection
// $con = new mysqli($servername, $username, $password, $database);

// // Check connection
// if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
//   }
//   echo "Connected successfully";
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "errigate";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
echo "Connected successfully";
?>