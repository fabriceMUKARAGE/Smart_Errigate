<?php 

require('../model/model.php');

$bed_id = $_GET['bed_id'];

$db = new Database();


if(isset($_GET['action']) && $_GET['action'] == "update"){
    $db->bedValve($bed_id);
}

?>