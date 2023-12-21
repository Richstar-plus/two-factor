<?php
session_start();
include_once("../php/config.php");

if(!isset($_SESSION['unique_id'])){
  header("location: ../index.php");
}

if(isset($_SESSION["alert"])){
  echo $_SESSION["alert"];
  unset($_SESSION["alert"]);
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
    <form action="../php/otp.php" method="POST">
      <h4 style="  margin: 30px 0 30px 60px;">OTP CONFIRMATION PAGE</h3>
      <?php
          if (isset($_SESSION["message"])) {
           echo " <p class='error'>{$_SESSION["message"]}</p>";
           unset($_SESSION["message"]);

          }
          ?>

      <div class="input-holder">

        <div style="margin-top: 30px;">
          <label for="" style="margin-left: 50px;">Enter OTP Sent to your email Address</label>
          <input type="text" placeholder="otp Required" style="margin-left: 40px;" name="otp">
        </div>
      </div>

      <div style="margin-left: 40px;">
        <button>ENTER</button>
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