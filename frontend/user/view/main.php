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
                     <a class="nav-link" href="../profile/profile.php">Edit Profile</a>
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
            <div class="row">
               <div class="col-lg-4 mb-4">
                  <div class="card h-100">
                     <h4 class="card-header">Bed 1: Pepper</h4>
                     <div class="card-img">
                        <img class="img-fluid" src="images/beds.png" alt="" />
                     </div>
                     <div class="card-body">
                        <div class="card-text">Soil humidity: 60% <br> Soil temperature: 35°C <br> PH: 7.33 <br> Nitrogen: 122mg/kg <br> Phosphorus: 99mg/kg
                           <br> Potassium: 107mg/kg <br> Water used(24h): 5L
                        </div>
                     </div>
                     <div class="card-footer">
                        <a href="#beds" class="btn btn-primary" id="valve" onclick="myFunction()">Open Valve</a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 mb-4">
                  <div class="card h-100">
                     <h4 class="card-header">Bed 2: Tomatoes</h4>
                     <div class="card-img">
                        <img class="img-fluid" src="images/beds.png" alt="" />
                     </div>
                     <div class="card-body">
                        <div class="card-text">Soil humidity: 60% <br> Soil temperature: 35°C <br> PH: 7.33 <br> Nitrogen: 122mg/kg <br> Phosphorus: 99mg/kg
                           <br> Potassium: 107mg/kg <br> Water used(24h): 5L
                        </div>
                     </div>
                     <div class="card-footer">
                        <a href="#" class="btn btn-primary">Open valve</a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 mb-4">
                  <div class="card h-100">
                     <h4 class="card-header">Bed 3: Strawberry</h4>
                     <div class="card-img">
                        <img class="img-fluid" src="images/beds.png" alt="" />
                     </div>
                     <div class="card-body">
                        <div class="card-text">Soil humidity: 60% <br> Soil temperature: 35°C <br> PH: 7.33 <br> Nitrogen: 122mg/kg <br> Phosphorus: 99mg/kg
                           <br> Potassium: 107mg/kg <br> Water used(24h): 5L
                        </div>
                     </div>
                     <div class="card-footer">
                        <a href="#" class="btn btn-primary">Open Valve</a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- About Section -->
        <div class="about-main">
            <div class="row">
               <div class="col-lg-6">
                  <h2>Farm Weather</h2>
                  <p>Read the farm weather and choose the best settings for automated irrigation</p>
                  <h5>Our smart approach</h5>
                  <ul>
                     <li>Temperature: 25°C</li>
                     <li>Relative Humidity: 65%</li>
                     <li>Wind Speed: 33Km/h</li>
                     <li>Wind Direction: 022° NE</li>
                     <li>Rainfall: 5mm</li>
                     <li>Solar Radiation: 0.22 W/m^3</li>
                  </ul>
                  <p>Read the farm weather data recorded over a period of time and make the right irrigation decisions for your crops. Open valves to water farm crops on a sunny day and
                     close valves on a rainy day to prevent leaching. 
                  </p>
               </div>
               <div class="col-lg-6">
                  <img class="img-fluid rounded" src="images/farm-weather.png" alt="" />
               </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- Tanks Section -->
        <div class="services-bar">
         <h1 class="my-4">Water Tanks </h1>
         <!-- Beds Section -->
         <div class="row">
            <div class="col-lg-4 mb-4">
               <div class="card h-100">
                  <h4 class="card-header">Tank 1</h4>
                  <div class="card-img">
                     <img class="img-fluid" src="images/water-tanks.jpg" alt="" />
                  </div>
                  <div class="card-body">
                     <div class="card-text">LEVEL: 60% <br> Refill: Ongoing <br> Rate: 100L/min
                     </div>
                  </div>
                  <div class="card-footer">
                     <a href="#" class="btn btn-primary">Open Valve</a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 mb-4">
               <div class="card h-100">
                  <h4 class="card-header">Tank 2</h4>
                  <div class="card-img">
                     <img class="img-fluid" src="images/water-tanks.jpg" alt="" />
                  </div>
                  <div class="card-body">
                     <div class="card-text">LEVEL: 60% <br> Refill: Ongoing <br> Rate: 100L/min
                     </div>
                  </div>
                  <div class="card-footer">
                     <a href="#" class="btn btn-primary">Open valve</a>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 mb-4">
               <div class="card h-100">
                  <h4 class="card-header">Tank 3</h4>
                  <div class="card-img">
                     <img class="img-fluid" src="images/water-tanks.jpg" alt="" />
                  </div>
                  <div class="card-body">
                     <div class="card-text">LEVEL: 60% <br> Refill: Ongoing <br> Rate: 100L/min
                     </div>
                  </div>
                  <div class="card-footer">
                     <a href="#" class="btn btn-primary">Open Valve</a>
                  </div>
               </div>
            </div>
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
<script>
   function myFunction() {
      if (document.getElementById("valve").innerHTML == "Close Valve"){
         document.getElementById("valve").style.color = "white";
         document.getElementById("valve").style.backgroundColor = "#5ec549";
         document.getElementById("valve").innerHTML = "Open Valve";
      }
      else{
         document.getElementById("valve").style.color = "#4e3914";
         document.getElementById("valve").style.fontWeight = "700";
         document.getElementById("valve").style.backgroundColor = "white";
         document.getElementById("valve").innerHTML = "Close Valve";
      }
   }
   </script>
</body>
</html>