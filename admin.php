<?php
session_start();
include_once("./php/config.php");

if(!isset($_SESSION['unique_id'])){
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Two Factor Access Control System</title>
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-image: url(images/dark.jpg);">
  <h3>TWO FACTOR ACCESS CONTROL SYSTEM</h3>
  <div class="form-container home-container" style="background: rgba(0, 139, 139, 0.526);">
   
    <div class="mobile-container">
    <div class="topnav">
      <div id="myLinks">
        <a href="#news">Add Image</a>
        <a href="#contact">Edit Profile</a>
      </div>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </div>

  <div class="Profile-holder">
    <span>PROFILE</span>
    <div class="profil-body">

      <div class="image">
        <img src="images/—Pngtree—user vector avatar_4830521.png" alt="">
      </div>

      <div class="welcome-div">
        <span>Welcome Admin your have successfully</span><br>
        <span style="margin-left: 180px;">logged in with your OTP.</span>
      </div>

    </div>

  </div>

  <div class="logout">
    <a href="./php/logout.php">Logout</a>
  </div>

  </div>

  <div class="pro">
    <p>
      &#169; 2023 Two factor login. All rights reserved | Designed by <span>Richstar Technology</span>
    </p>
  </div>
  

  <script>
    function myFunction() {
      var x = document.getElementById("myLinks");
      if (x.style.display === "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";
      }
    }
    </script>
</body>
</html>