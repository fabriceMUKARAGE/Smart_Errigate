<?php 

session_start();
$email_session = $_SESSION["email"];
$id = $_GET['id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>E-rrigate </title>
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />
	<!-- Fontawesome CSS -->
	<link href="css/all.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-light top-nav fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
            <img src="images/Elogo.png" alt="logo" class="logo"/>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="main.php?id=<?php echo "".$id?>">All Components</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="beds.php?id=<?php echo "".$id?>">Beds</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="tanks.php?id=<?php echo "".$id?>">Tanks</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="sensors.php?id=<?php echo "".$id?>">Sensors</a>
                  </li>
				  <!-- <li class="nav-item">
					<a class="nav-link" href="../profile/profile.php">Edit Profile</a>
				 </li> -->
				 <li class="nav-item">
					<a class="logout-link" href="../../../index.php">Logout</a>
				 </li>
               </ul>
            </div>
        </div>
    </nav>
	<!-- full Title -->
	<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3">Farm beds
			</h1>
		</div>
	</div>
    <!-- Page Content -->
    <div class="container">
		<div class="breadcrumb-main">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="main.php">Main</a>
				</li>
				<li class="breadcrumb-item active">Beds</li>
			</ol>
		</div>

		<!-- All Beds -->
		<div class="services-bar">
            <h1 class="my-4" id="beds">All Beds </h1>
            <!-- Beds Section -->
			<div id="showBeds">

			</div>
        </div>
	</div>

    <!--footer starts from here-->
	<footer class="footer">
	</div>
	<div class="container">
		<div class="footer-logo">
			<a href="#"><img src="images/Elogo.png" class="logo" alt="" /></a>
		</div>
		<!--foote_bottom_ul_amrc ends here-->
		<p class="copyright text-center">All Rights Reserved. &copy; 2022 <a href="#">E-rrigate</a> Design By : 
			<a href="#">Smartzoid</a>
		</p>
		<ul class="social_footer_ul">
			<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
			<li><a href="#"><i class="fab fa-twitter"></i></a></li>
			<li><a href="#"><i class="fab fa-linkedin"></i></a></li>
			<li><a href="#"><i class="fab fa-instagram"></i></a></li>
		</ul>
		<!--social_footer_ul ends here-->
	</div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
   function myFunction($val) {
      if (document.getElementById($val).innerHTML == "Valve Closed"){
        //  document.getElementById($val).style.color = "white";
        //  document.getElementById($val).style.backgroundColor = "#5ec549";
        //  document.getElementById($val).innerHTML = "Open Valve";
      }
      else{
        //  document.getElementById($val).style.color = "#4e3914";
        //  document.getElementById($val).style.fontWeight = "700";
        //  document.getElementById($val).style.backgroundColor = "white";
        //  document.getElementById($val).innerHTML = "Close Valve";
      }
   }
</script>
<style>
    .closed {
        color: #fff;
        background-color: #5ec549 !important;
    }

    .opened {
        color: #4e3914;
        background-color: white !important;
        font-weight: 700;
    }

    .opened:hover{
        color: #4e3914 !important;
    }
</style>
<script type="text/javascript"> 
$(document).ready(function() {

    ShowBeds();

    function ShowBeds() {
          $.ajax({
              url: ["../controller/beds.php?id=<?php echo "".$id?>"],
              type: "POST",
              data: {
                  action: "bed"
              },
              success:function(response) {
                  // console.log(response);
                  $("#showBeds").html(response);

              }
          });
      }

	})
</script>
</body>
</html>
