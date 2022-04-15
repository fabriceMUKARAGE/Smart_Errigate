<?php
// session_start();
// $Email = $_SESSION['email'];
// // echo "Welcome " . $Email;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>E-rrigate</title>
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />
    <!-- Boxicons CDN Link -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      
      <span class="logo_name"><br><img src="../Elogo.png" alt="Logo image" width="40%" height="40%"></span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="manage-users.php">
            <i class='fas fa-user' ></i>
            <span class="links_name">Users</span>
          </a>
        </li>
        <li>
          <a href="beds.php">
            <i class='fas fa-tree' ></i>
            <span class="links_name">Beds</span>
          </a>
        </li>
        <li>
          <a href="tanks.php">
            <i class='fas fa-water' ></i>
            <span class="links_name">Tanks</span>
          </a>
        </li>
        <li>
          <a href="#" class="active">
            <i class='fas fa-thermometer-half' ></i>
            <span class="links_name">Sensors</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='fa fa-cog' ></i>
            <span class="links_name">Settings</span>
          </a>
        </li>
        <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_logout">Sign out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard" style="color: #9DAF8B;">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="addcustomer">
        <button class="btn btn-success" type="button" data-toggle="modal"
        data-target="#addModal">Add Sensor</button>
      </div>
      <div class="profile-details">
        <img src="../images/profile.jpg" alt="">
        <span class="admin_name">Fabrice Mukarage</span>
        <i class='bx bx-chevron' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="display">
        <div class="info">
          <h1>Farm Sensors</h1>
        </div>
        <div class="info1">
          <!-- <a class="sortDate"  href="#">Icon</a>
          <i class='bx bx-chevron' ></i> -->
          <a href="action.php?export=excel" class="btn btn-success m-1 float-right">
          <i class="fas fa-table fa-lg"></i>&nbsp;&nbsp;Export to Excel</a>
        </div>
        <div class="info">
        <a href="#" class="btn btn-success m-1 float-right">
          <i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo "".date("Y/m/d"); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- Add new user  -->
  <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add new Sensor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body px-4">
                    <form action="" method="post" id="form-data">
                        <div class="form-group">
                            <input type="text" name="user_id" placeholder="User ID" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="sensor_name" placeholder="Sensor Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="location" placeholder="Sensor Location" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="type" placeholder="Sensor Type" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="insert" id="insert" value="Submit" placeholder="Firstname"
                                class="btn btn-success btn-block">
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
 <script src="script.js"></script>

</body>
</html>
