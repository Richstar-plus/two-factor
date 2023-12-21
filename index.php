<?php
session_start();
include_once("./php/config.php");
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
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
  <h3>TWO FACTOR ACCESS CONTROL SYSTEM</h3>
  <div class="form-container">
    <form action="./php/login.php" method="POST">
      <h4>SIGN IN</h3>
      

      <div class="input-holder">

      
      
      <?php
          if (isset($_SESSION["message"])) {
           echo " <div>  <input type='text' value='{$_SESSION["message"]}' style='  background: rgb(234, 212, 212); border: none; color: rgb(180, 11, 11); width: 350px'>
           </div>";
           unset($_SESSION["message"]);

          }
          ?>
          
        <div>

          <label for="username">USERNAME OR EMAIL</label><br>
          <input type="text" placeholder="Enter username or Email address" name="email">
        </div>


        <div style="margin-top: 30px;">
          <label for="email">PASSWORD</label><br>
          <input type="password" placeholder="Enter password" name="password">
        </div>
      </div>
      
      <div class="Register-link" style="margin-left: 200px; margin-top: 30px;">
        <span><a href="register.php" style="color: rgb(255, 248, 55);">Register Here</a></span>
      </div>
      <div>
        <button>SIGN IN</button>
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