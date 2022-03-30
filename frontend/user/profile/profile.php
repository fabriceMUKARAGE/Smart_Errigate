<?php 
        require '../../../../Errigate/connection.php';
        $id=$_GET['updateid'];
        $sql="Select * from `customers` where id=$id";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        $email=$row['email'];
        $password=$row['password'];
        $phone_number=$row['phone_number'];
       
    
        if(isset($_POST['submit'])){
            $email=$_POST['email'];
            $password=$_POST['password'];
            $phone_number=$_POST['phone_number'];
    
            $sql="update `customers` set id=$id,email='$email',password='$password',phone_number='$phone_number' where id=$id";
            echo "Updated successfully";
            $result=mysqli_query($con,$sql);
            if($result){
                echo "<script>alert('Profile updated successfully');</script>";
                header('location: ../../../customerIndex.php');
            }
            else{
                die(mysqli_error($con));
            }
        }
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>E-Irrigation</title>
</head>
<body>
    <!--Loading the page-->
    <body onload="myFunction()" style="margin:0;">
        <img class="imagelogo" src="../../assets/Elogo.png" alt="Logo image" width="150" height="150">
        
        <!--profile picture-->
        <div class="profile-pic">
            <label class="-label" for="file">
              <span class="glyphicon glyphicon-camera"></span>
              <span>Change Image</span>
            </label>
            <input id="file" type="file" onchange="loadFile(event)" />
            <img src="noprofil.jpg" id="output" width="200" />
          </div>
        <!--JavaScript for editing a picture -->
        <script>
        var loadFile = function (event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
          };
          </script>        

        <!--Updating customer information -->

        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">         
                        <div class="container">
                            <form id="form" class="form" method="post">
                                <div class="form-control">
                                    <label for="username" style="color: #496130; font-size: 50px;"><br>Edit Profile</label>
                                </div>
                                <div class="form-control">
                                    <label for="email">Email address</label>
                                    <input type="text" name="email" value=<?php echo $email; ?> placeholder="John.Doe@hotmail.com" id="email" required>
                                    <small id='email'></small>
                                </div>
                                <div class="form-control">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone_number" value=<?php echo $phone_number; ?> placeholder="+233 24 412 3456" id="phone" required>
                                    <small id='phoneError'></small>
                                </div>
                                <div class="form-control">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value=<?php echo $password; ?> placeholder="*******************" id="password" required>
                                    <small id='passwordError'></small>
                                </div>
                                <small id='success'></small>
                                <button type="submit" name="submit" id='submitBtn'>Done</button>
                            </form>
                        </div>

     

        <!--script that allow the page to take sometimes to load for the next page-->
        <script>
        var myVar;

        function myFunction() {
        myVar = setTimeout(showPage, 500);
        }

        function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
        }
        </script>

        <!--codes that support the script and jquery library-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./script.js"></script>
    </body>
</html>
