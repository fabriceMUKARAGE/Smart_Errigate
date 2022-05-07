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
	<title> E-rrigate </title>
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
                     <a class="nav-link" href="beds.php?id=<?php echo "".$id?>">Beds</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="tanks.php?id=<?php echo "".$id?>">Tanks</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="sensors.php?id=<?php echo "".$id?>">Sensors</a>
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
			<h1 class="mt-4 mb-3">Sensors
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
				<li class="breadcrumb-item active">Sensors</li>
			</ol>
		</div>
		<div class="table-responsive" id="showUser">
			
		  </div>
    </div>
    <!-- /.container -->

    <!--footer starts from here-->
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
<!-- Contact form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<script type="text/javascript"> 
$(document).ready(function() {

    ShowAllUsers();

    function ShowAllUsers() {
          $.ajax({
              url: ["../controller/sensors.php?id=<?php echo "".$id?>"],
              type: "POST",
              data: {
                  action: "view"
              },
              success:function(response) {
                  // console.log(response);
                  $("#showUser").html(response);

              }
          });
      }
	})
</script>
</body>
</html>
