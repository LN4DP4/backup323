<?php

include_once 'db.php';
include_once 'user.php';

session_start();

//i dentifitying if a user has loged in
$logged_in = false;
if (isset($_SESSION['user'])) {
    $logged_in = true;
    $user = unserialize($_SESSION['user']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="webstyle.css">
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Document</title>
    <?php 
    //if logout button used, send user to logout.php
    if (array_key_exists('Logout',$_POST)) {
        header("Location: /Gibjohn/logout.php");
    }

    //if login button used send user to tutor_student.php
    else if (array_key_exists('Login',$_POST)) {
        header("Location: /Gibjohn/Tutor_student.php");
    }
    ?>
</head>
<body>
    
<nav class="navbar navbar-expand-sm grey">
    <div class="container-fluid">
        <a class="navbar-brand" href="Homepage.php">
            <img src="logo.png" alt="Company logo" style="width:99px; height:60px">
        </a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Contact.php">Contact Us</a>
                </li>
                <?php 
                //this displays the dashboard for the excact type of member, if one has login
                    if ($logged_in):
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo($_SESSION['member_type']."_dashboard.php") ?>"><?php echo($_SESSION['member_type']." Dashboard") ?></a>
                </li>
                <?php endif ?>
            </ul>
            <form class="d-flex" method="post">
                <?php 
                    if ($logged_in):
                ?>
                
                <p style="color: white;"> <!-- displays the users name -->
                    Hello, <?php echo $_SESSION['first_name'] ?> <input type="submit" class="btn btn-primary" name="Logout" id="Logout" value="Logout">
                </p>
                
                <?php
                    else: 
                ?>
                <p>
                    <input type="submit" class="btn btn-primary" name="Login" id="Login" value="Login">
                </p>
                
                <?php endif ?>
            </form>
        </div>
    </div>
</nav> 
<center>
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="video_call.jpg" alt="Los Angeles" class="d-block" style="width: 60%;">
      <div class="carousel-caption">
        <h3>"Live as if you were to die tomorrow. Learn as if you were to live forever."</h3> <h5>- Mahatma Gandhi</h5>
        <button class="btn btn-primary">Create an account!</button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="education3.jpg" alt="Chicago" class="d-block" style="width: 60%">
      <div class="carousel-caption">
        <h3>"Once you stop learning, you start dying."</h3> <h5>- Albert Einstein</h5>
        <button class="btn btn-primary">Contact Us!</button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="design.jpg" alt="New York" class="d-block" style="width: 60%">
      <div class="carousel-caption">
        <h3>"It always seems impossible until it's done."</h3> <h5>- Nelson Mandela</h5>
      </div>
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next " type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
</center>
</body>
</html>