<?php
session_start();
$Email = $_SESSION['email'];
echo "Welcome " . $Email;
// $id=6;
// echo '<a href="frontend/user/profile/profile.php?updateid='.$id.'">edit profile</a>';
?>