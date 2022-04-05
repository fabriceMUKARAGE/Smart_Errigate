<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require('PHPMailer/Exception.php');
require('../../PHPMailer/SMTP.php');
require('../../PHPMailer/PHPMailer.php');
?>
            <?php
                    include('../../connection.php');
                    if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
                        $email = $_POST["email"];
                        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                        if (!$email) {
                            $error .="Invalid email address";
                        } else {
                            $sel_query = "SELECT * FROM `admin` WHERE email='" . $email . "'";
                            $results = mysqli_query($con, $sel_query);
                            $row = mysqli_num_rows($results);
                            if ($row == "") {
                                $error .= "User Not Found";
                            }
                        }
                        if ($error != "") {
                            echo $error;
                        } else {

                            $output = '';

                            $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
                            $expDate = date("Y-m-d H:i:s", $expFormat);
                            $key = md5(time());
                            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                            $key = $key . $addKey;
                            // Insert Temp Table
                            mysqli_query($con, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");

                            $output.='<p>Please click on the following link to reset your password.</p>';
                            //replace the site url
                            $output.='<p><a href="http://localhost/smartzoid/Errigate/frontend/Admin/newPasswordAdmin.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost/smartzoid/Errigate/frontend/Admin/newPasswordAdmin.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
                            $body = $output;
                            $subject = "Password Recovery for E-rrigate";

                            $email_to = $email;


                            //autoload the PHPMailer
                            // require("vendor/autoload.php");
                            $mail = new PHPMailer(true);
                            $mail->IsSMTP();
                            $mail->Host = "smtp.gmail.com"; // Enter your host here
                            $mail->SMTPAuth = true;
                            $mail->Username = "errigate22@gmail.com"; // Enter your email here
                            $mail->Password = "20?errigate22!"; //Enter your passwrod here
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
                            $mail->Port = 465;
                            $mail->IsHTML(true);
                            $mail->setFrom('errigate22@gmail.com', 'E-rrigate');
                            // $mail->FromName = "Rathorji PHP Tutorial";

                            $mail->Subject = $subject;
                            $mail->Body = $body;
                            $mail->AddAddress($email_to);
                            if (!$mail->Send()) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            } else {
                                echo "<script>alert('Email has been sent');</script>";
                            }
                        }
                    }
?>

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

                <!-- instruction sentences-->
                <div class="text">
                <p>Important information</p>
                <p>Please read the information below and then kindly share the requested information</p>
                <p style="color: brown;">1. Do not reveal your password to anybody</p>
                <p style="color: brown;">2. Do not reuse password</p>
                <p style="color: brown;">3. Use Alphanumeric password</p>
                <p style="color: brown;">4. Ensure that your email is correct</p>
                
            </div>
            <div class="Conditions">
                <p>Terms and conditions| FAQs | Contact us</p>
            </div>

                
                <!--container of forgot password-->
                <div class="container">
                    <form id="form" class="form" method="POST" action=""> 
                        <h1 style="color: white;">Forgot <br>Password?</h1><br>
                        <h3 style="color: white;">Don't worry. We can help.</h3>
                        <div class="form-control">
                            <input type="text" name="email" placeholder="Please type your email address" id="email" required>
                            <small id='emailError'></small>
                        </div>

                        <div>
                            <label for="id">I can't remember my password</label><br>
                        </div>
                        <small id='success'></small>
                        <button type="submit" id='submitBtn' value="Reset Password">Submit Email</button><br>

                        <div class="back">
                            <label style="color: white;" for="id">Remembered your password?</label><br><br>
                            <label for="id"><a style="text-decoration: none; color: #60615F; font-size: 16px;" href="loginAdmin.php">Back to Login</a> </label>
                        </div>
                      
                    </form>
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
</html>
