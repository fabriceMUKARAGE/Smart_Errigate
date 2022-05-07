<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forgot.css">
    <title>E-Irrigation</title>
</head>
<body>
    <!--Looking the page-->
    <body onload="myFunction()" style="margin:0;">
        
        <div id="loader"></div>
            <div style="display:none;" id="myDiv" class="animate-bottom">
            
            <!-- Image logo-->
            <img src="../assets/Elogo.png" alt="Logo image" width="200" height="200">

                
            <!-- text instruction sentences-->
            <div class="text">
                <p>Important information</p>
                <p>Please read the information below and then kindly share the requested information</p>
                <p style="color: brown;">1. Do not reveal your password to anybody</p>
                <p style="color: brown;">2. Do not reuse password</p>
                <p style="color: brown;">3. Use Alphanumeric password</p>
            </div>
            <div class="Conditions">
                <p>Terms and conditions| FAQs | Contact us</p>
            </div>


            <script>
          
                // Function to check Whether both passwords
                // are the same or not.
                function checkPassword(form) {
                    password1 = form.password1.value;
                    password2 = form.password2.value;
      
                    // If password not entered
                    if (password1 == ''){
                        alert ("Please enter Password");
                        return false;
                    }
                          
                    // If confirm password not entered
                    else if (password2 == ''){
                        alert ("Please enter confirm password");
                        return false;
                    }
                        
                    // If Not same return False.    
                    else if (password1 != password2) {
                        alert ("\nPassword did not match: Please try again...")
                        return false;
                    }
      
                    // If same return True.
                    else{
                        alert("Congratulations! you have changed your password")
                        return true;
                    }
                }
            </script>

                <!--container of forgot password-->
                <div class="container">
                <?php
                    include('../../connection.php');
                    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
                        $key = $_GET["key"];
                        $email = $_GET["email"];
                        $curDate = date("Y-m-d H:i:s");
                        $query = mysqli_query($con, "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';");
                        $row = mysqli_num_rows($query);
                        if ($row == "") {
                            $error .= '<h2>Invalid Link</h2>';
                        } else {
                            $row = mysqli_fetch_assoc($query);
                            $expDate = $row['expDate'];
                            if ($expDate >= $curDate) {
                                ?>
                    <form id="form" class="form" method="POST" action="" name="update"> 
                        <h1 style="color: white;">Forgot <br>Password?</h1><br>
                        <h3 style="color: white;">Don't worry. We can help.</h3>
                        <input type="hidden" name="action" value="update" class="form-control"/>

                        <div class="form-control">
                            <input type="password" name="pass1"  value="update" placeholder="Please enter your new password" id="email" required>
                            <small id='emailError'></small>
                        </div>
                        <div class="form-control">
                            <input type="password" name="pass2" value="update" placeholder="Please re-enter your new password" id="ID" required>
                            <small id='emailError'></small>
                        </div>

                        <input type="hidden" name="email" value="<?php echo $email; ?>"/>

                        <div>
                            <label for="id">I can't remember my password</label><br>
                        </div>
                        <small id='success'></small>
                        <button type="submit" id='submitBtn'>Done</button><br>

                        <div class="back">
                            <label style="color: white;" for="id">Remembered your password?</label>
                            <label for="id"><a style="text-decoration: none; color: #60615F; font-size: 16px;" href="loginAdmin.php">Back to Login</a> </label>
                        </div>
                      
                    </form>
                    <?php
                            } else {
                                $error .= "<h2>Link Expired</h2>>";
                            }
                        }
                        if ($error != "") {
                            echo "<div class='error'>" . $error . "</div><br />";
                        }
                    }


                    if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                        $error = "";
                        $pass1 = mysqli_real_escape_string($con, $_POST["pass1"]);
                        $pass2 = mysqli_real_escape_string($con, $_POST["pass2"]);
                        $email = $_POST["email"];
                        $curDate = date("Y-m-d H:i:s");
                        if ($pass1 != $pass2) {
                            $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
                        }
                        if ($error != "") {
                            echo $error;
                        } else {

                            $pass1 = md5($pass1);
                            mysqli_query($con, "UPDATE `admin` SET `password` = '" . $pass1 . "' WHERE `email` = '" . $email . "'");

                            mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `email` = '$email'");

                            header("Location: loginAdmin.php");
                            // exit();

                            echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>';
                        }
                    }
                    ?>
                </div>
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
    <!--End of the body-->
</html>
