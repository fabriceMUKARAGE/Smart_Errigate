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
                     <a class="nav-link active" href="main.php?id=<?php echo "".$id?>">All Components</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="beds.php?id=<?php echo "".$id?>">Beds</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="tanks.php?id=<?php echo "".$id?>">Tanks</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="sensors.php?id=<?php echo "".$id?>">Sensors</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="../profile/profile.php?id=<?php echo "".$id?>">Edit Profile</a>
                  </li>
                  <li class="nav-item">
                     <a class="logout-link" href="../../../index.php">Logout</a>
                  </li>
               </ul>
            </div>
        </div>
    </nav>
    <header class="slider-main">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
               <!-- Slide One - Set the background image for this slide in the line below -->
               <div class="carousel-item active" style="background-image: url('images/slide-1.png')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>Welcome to E-rrigate</h3>
                     <?php echo "<p>" . $email_session . "<p>"; ?>
                     <!-- <p>Irrigate your farm crops the smart way</p> -->
                  </div>
               </div>
               <!-- Slide Two - Set the background image for this slide in the line below -->
               <div class="carousel-item" style="background-image: url('images/slide-2.png')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>Smart irrigation with E-rrigate</h3>
                     <p>Water your crops with just a click</p>
                  </div>
               </div>
               <!-- Slide Three - Set the background image for this slide in the line below -->
               <div class="carousel-item" style="background-image: url('images/slide-3.png')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>Smart irrigation with E-rrigate</h3>
                     <p>Harvest healthy and beautiful crops</p>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
            </a>
        </div>
    </header>
    <!-- Page Content -->
    <div class="container">
        <div class="services-bar" id="beds">
            <h1 class="my-4"> Beds </h1>
            <!-- Beds Section -->
            <div class="row" id="showBeds">
              
            </div>
            <!-- /.row -->
        </div>
        <!-- About Section -->
        <div class="about-main">
            <div class="row" id="showFarmWeather">
              
            </div>
            <!-- /.row -->
        </div>
        <!-- Tanks Section -->
        <div class="services-bar" id="tanks">
         <h1 class="my-4">Water Tanks </h1>
         <!-- Beds Section -->
         <div class="row" id="showTanks">
           
         </div>
         <!-- /.row -->
     </div>
        <hr>
        <!-- Get In Touch Now Section -->
        <div class="row mb-4">
            <div class="col-md-8">
               <p>Want to add a tank, sensor, bed or  create a new farm?</p>
            </div>
            <div class="col-md-4">
               <a class="btn btn-lg btn-secondary btn-block" href="#">Explore Features</a>
            </div>
        </div>
    </div>
    <!-- /.container -->
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

<script type="text/javascript"> 
$(document).ready(function() {

    ShowFeaturedBeds();
    ShowFarmWeather();
    ShowFeaturedTanks();

    function ShowFeaturedBeds() {
          $.ajax({
              url: ["../controller/main.php?id=<?php echo "".$id?>"],
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


      function ShowFarmWeather() {
          $.ajax({
              url: ["../controller/main.php?id=<?php echo "".$id?>"],
              type: "POST",
              data: {
                  action: "weather"
              },
              success:function(response) {
                  // console.log(response);
                  $("#showFarmWeather").html(response);

              }
          });
      }

      function ShowFeaturedTanks() {
          $.ajax({
              url: ["../controller/main.php?id=<?php echo "".$id?>"],
              type: "POST",
              data: {
                  action: "tank"
              },
              success:function(response) {
                  // console.log(response);
                  $("#showTanks").html(response);

              }
          });
      }

	})
</script>
</body>
</html>