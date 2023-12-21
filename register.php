<?php
session_start();
include_once("php/config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/styles.css">
  <title>Register</title>
</head>
<body>
  
<h3>TWO FACTOR ACCESS CONTROL SYSTEM</h3>
  <div class="form-container">
    <form action="./php/signup.php" method="POST">
      <h4>SIGN UP</h3>
          <?php
          if (isset($_SESSION["message"])) {
           echo " <p class='error'>{$_SESSION["message"]}</p>";
           unset($_SESSION["message"]);

          }
          ?>
       

      <div class="input-holder">

        <div>
          <label for="name">FULL NAME</label><br>
          <input type="text" name="fname" styles="width: 100%">
        </div>

        <div>
          <label for="username">USERNAME</label><br>
          <input type="text" name="username">
        </div>

        <div>
          <label for="Phone">PHONE NUMBER</label><br>
          <input type="text" placeholder="Phone number (11 digits)" name="phone">
        </div>

        <div>
          <label for="email">EMAIL ADDRESS</label><br>
          <input type="text" placeholder="Enter valid Email" name="email">
        </div>
      </div>

      <div >
        <button name="submit">SIGN UP</button>
      </div>

    <div class="login-link">
      <span><a href="index.php">Login Here</a></span>
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