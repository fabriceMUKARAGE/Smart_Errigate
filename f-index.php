<!-- This is the landing page  -->




<?php 

session_start();

// if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>

<!DOCTYPE html>

<html>

<head>

    <title>HOME</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

  

     <a href="logout.php">Logout</a>
     <a href="./frontend/Admin/loginAdmin.php">sign in as admin</a>
     <a href="user/.php">sign in as user</a>

</body>

</html>

<?php 

//}
// else{

//      header("Location: index.php");

//      exit();

// }

 ?>