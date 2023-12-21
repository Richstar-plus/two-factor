<?php
session_start();
include_once("config.php");

$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];


if(!empty($password) && !empty($confirmPassword)){
  if($password == $confirmPassword){
    $newPassword = md5($password);
    $sql = mysqli_query($conn, "UPDATE `users` SET `password`='$newPassword' WHERE unique_id = '{$_SESSION['unique_id']}'");
    if($sql){
      $_SESSION["alert"] = "<script>alert('Registeration Successful!, login to your account');</script>";
    header("location: ../index.php");
    }else{
      $_SESSION["message"] = "Something went wrong!";
    }
  }
  else{
    $_SESSION["message"] = "Password does not match";
    header("location: ../file/password.php");
  }
     }else{
      $_SESSION["message"] = "All input fields are required";
      header("location: ../file/password.php");
    }



?>