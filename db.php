<!-- <?php
// $server = "localhost:3306";
// $user = "root";
// $pwd = "";
// $db = "errigate";

// $conn = new mysqli($server, $user, $pwd, $db);

//  header("Content-Type: text/html");
// if($conn->connect_errno)
// {http_response_code(400);
//     echo  $conn->connect_error; exit();}

?> -->


<?php
//Insert details of Database 
$dbname = 'errigate';
$dbuser = 'root';  
$dbpass = ''; 
$dbhost = 'localhost'; 

// Establish a connection and ensure that it works 

$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

//echo "Connection Success!<br><br>";

?>
