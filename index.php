<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css">
    
    <title>E-rrigate</title>
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark mt-2">
            <div class="container-fluid">
              <a class="navbar-brand fw-bold" href="#"><img src="logo.png" alt="Logo image" width="150" height="150"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                      </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="#">Options</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><button style="background-color: #283F18; color:white; border-radius:14px;" type="submit" id='connect'>Connect</button></a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>
    <div class="displaying">
        <div class="Imagebg">
            <img src="photo.png" alt="background image" width="60%" height="80%">
        </div>
        <div class="txt">
            <p><span>Automatic Irrigation</span><br>has never been<br>this easy</p>
            <a class="bt"  href="./frontend/Admin/loginAdmin.php"><button style="background-color: #283F18; color:white; border-radius:14px;" type="submit" id='connect'>Admin Login</button></a>
            <a class="bt" href="./frontend/user/loginUser.php"><button style="background-color: #283F18; color:white; border-radius:14px;" type="submit" id='connect'>User Login</button></a>
        </div>
    </div>
