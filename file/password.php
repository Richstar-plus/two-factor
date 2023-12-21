<?php
session_start();
include_once("../php/config.php");

if(!isset($_SESSION['unique_id'])){
  header("location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Two Factor Access Control System</title>
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
  <h3>TWO FACTOR ACCESS CONTROL SYSTEM</h3>
  <div class="form-container">
    <form action="../php/password.php" method="POST">
      <h4 style="  margin: 30px 0 30px 60px;">CREATE NEW PASSWORD</h3>
      <?php
          if (isset($_SESSION["message"])) {
           echo " <p class='error'>{$_SESSION["message"]}</p>";
           unset($_SESSION["message"]);

          }
          ?>

      <div class="input-holder">

        <div style="margin-top: 30px;">
          <label for="" style="margin-left: 50px;">Enter New Password</label>
          <input type="password" placeholder="Enter Secured Password" style="margin-left: 40px;" name="password">
        </div>

        <div style="margin-top: 30px;">
          <label for="" style="margin-left: 50px;">Confirm Password</label>
          <input type="password" placeholder="Repeat Password" style="margin-left: 40px;" name="confirmPassword">
        </div>
      </div>

      <div style="margin-left: 40px;">
        <button name="save">SAVE</button>
      </div>
    </div>


    </form>
  </div>

  <div class="pro">
    <p>
      &#169; 2023 Two factor login. All rights reserved | Designed by <span>Richstar Technology</span>
    </p>
  </div>
  
</body>
</html>