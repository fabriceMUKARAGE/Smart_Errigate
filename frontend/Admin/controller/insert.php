<?php
//Insert details of Database 
$dbname = 'testesp';
$dbuser = 'root';  
$dbpass = ''; 
$dbhost = 'localhost'; 

// Establish a connection and ensure that it works 

$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("could not connect data");

if(isset($_GET['insert']))
{
$temperature = $_GET['temperature'];
$humidity = $_GET['humidity']; 

$query = "INSERT INTO `testesp` (`temperature`,`humidity`) VALUES ('$temperature', '$humidity')";
$result = mysqli_query($connect,$query);



if ($result)
    echo "success";
else
    echo "error".mysqli_error($con);

}

?>





