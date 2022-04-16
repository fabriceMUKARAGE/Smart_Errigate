<?php
// session_start();
// $Email = $_SESSION['email'];
// echo "Welcome " . $Email;
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
          <a href="#" class="active">
            <i class='fas fa-water' ></i>
            <span class="links_name">Tanks</span>
          </a>
        </li>
        <li>
          <a href="sensors.php">
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
        data-target="#addModal">Add Water Tanks</button>
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
          <h1>Water Tanks</h1>
        </div>
        <div class="info1">
          <!-- <a class="sortDate"  href="#">Icon</a>
          <i class='bx bx-chevron' ></i> -->
          
          <a href="../controller/tanks.php?export=excel" class="btn btn-success m-1 float-right">
          <i class="fas fa-table fa-lg"></i>&nbsp;&nbsp;Export to Excel</a>
        </div>
        <div class="info">
        <a href="#" class="btn btn-success m-1 float-right">
          <i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo "".date("Y/m/d"); ?></a>
        </div>
      </div>
      <div class="ml-5 mr-5">
      <hr class="my-1">
    <div class="table-responsive" id="showUser">

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
                    <h4 class="modal-title">Add new Tank</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body px-4">
                    <form action="" method="post" id="form-data">
                        <div class="form-group">
                            <input type="text" name="user_id" placeholder="User ID" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="tank_name" placeholder="Tank Name" class="form-control">
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




    <!-- Edit user  Modal-->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Tank Info</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body px-4">
                    <form action="" method="post" id="edit-form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <input type="text" name="user_id" id="user_id" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="tank_name" id="tank_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update" id="update" value="Update" placeholder="Firstname"
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
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="script.js"></script>

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
 <script type="text/javascript">

 
 $(document).ready(function() {
    
    ShowAllUsers();

    function ShowAllUsers() {
          $.ajax({
              url: ["../controller/tanks.php"],
              type: "POST",
              data: {
                  action: "view"
              },
              success:function(response) {
                  // console.log(response);
                  $("#showUser").html(response);
                  $("table").DataTable();
              }
          });
      }


      // insert ajax request
      $("#insert").click(function(e) {
          if ($("#form-data")[0].checkValidity) {
              e.preventDefault();
              $.ajax({
                  url: ["../controller/tanks.php"],
                  type: "POST",
                  data: $("#form-data").serialize() + "&action=insert",
                  success: function(response) {

                      Swal.fire({
                      title: 'Tank added successfully!',
                      showConfirmButton: false,
                      type: 'success',
                      icon: 'success',
                      timer: 500,
                      timerProgressBar: true,
                  })

                  $("#addModal").modal("hide");
                  $("#form-data")[0].reset();
                  ShowAllUsers();

                    }
                });
            }
      });




      // Edit tank
      $("body").on("click", ".editBtn", function(e) {
          // console.log("working");
          e.preventDefault();
          edit_id = $(this).attr("id");
          $.ajax({
            url: "../controller/tanks.php",
            type: "POST",
            data: {
              edit_id: edit_id
              },
            success: function(response) {
              console.log(response);
              data = JSON.parse(response);
              // console.log(data);
              $("#id").val(data.id);
              $("#user_id").val(data.user_id);
              $("#tank_name").val(data.tank_name);
              
            }
            });
        });


            // Update ajax request
    $("#update").click(function(e) {
        if ($("#edit-form-data")[0].checkValidity) {
          e.preventDefault();
          $.ajax({
            url: ["../controller/tanks.php"],
            type: "POST",
            data: $("#edit-form-data").serialize() + "&action=update",
            success: function(response) {

              Swal.fire({
                  title: 'Tank info updated successfully!',
                  showConfirmButton: false,
                  type: 'success',
                  icon: 'success',
                  timer: 800,
                  //timerProgressBar: true,
              })

              $("#editModal").modal("hide");
              $("#edit-form-data")[0].reset();
              ShowAllUsers();
            }
          });
        }
    });

 // Delete ajax request 
 $("body").on("click", ".delBtn", function(e) {
          e.preventDefault();
          var tr = $(this).closest("tr");
          del_id = $(this).attr("id");
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                  url: '../controller/tanks.php',
                  type: 'POST',
                  data: {
                    del_id: del_id
                  },
                success: function(response) {
                  tr.css('background-color', '#ff6666');
                  Swal.fire({
                    title: 'User deleted successfully!',
                    showConfirmButton: false,
                    type: 'success',
                    icon: 'success',
                    timer: 900,
                    //timerProgressBar: true,
                  })
                  ShowAllUsers();
                        }
                    });

                }
            })

        });





     // Show users detail  page
     $("body").on("click",".infoBtn",function(event){
          event.preventDefault();
          info_id = $(this).attr("id");
          $.ajax({
            url: "../controller/tanks.php",
            type: "POST",
            data: {info_id: info_id},
            success: function(response) {
              //console.log(response);
              data = JSON.parse(response);
              Swal.fire({
                title: '<strong>User info : ID '+data.id+'</strong>',
                type: 'info',
                html: '<b>User ID:</b> '+data.user_id + '<br>' + 
                      '<b>Tank Name:</b> '+data.tank_name 
                     
              })
            }
          });
      });

    })






















</script> 











</body>
</html>
