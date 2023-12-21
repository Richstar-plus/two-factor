<?php
session_start();
include_once("config.php");
$otp = $_POST["otp"];
$unique_id = $_SESSION["unique_id"];

if(!empty($otp)){
  $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id = '{$unique_id}'");
  if($sql){
    $row = mysqli_fetch_assoc($sql);
    $session_otp = $row['otp'];
  }

  if($otp == $session_otp){

    $sql1 = mysqli_query($conn,"SELECT * FROM users WHERE unique_id = '{$unique_id}' AND otp = '{$otp}'");

    if(mysqli_num_rows($sql1) > 0){

      $null_otp = 0;
      $sql3 = mysqli_query($conn,"UPDATE `users` SET `otp`='$null_otp', `verification_status`='verified' WHERE unique_id = '$unique_id'");

      $sql4 = mysqli_query($conn,"SELECT * FROM users WHERE unique_id = '$unique_id'");
      if(mysqli_num_rows($sql4) > 0){
        $row = mysqli_fetch_assoc($sql4);
        if($row){
          $_SESSION['unique_id'] = $row['unique_id'];
          $_SESSION['verification_status'] = $row['verification_status'];
          header("location: ../admin.php?unique_id={$_SESSION['unique_id']}");
        }
      }
    }

  }else{
    $_SESSION['message'] = 'Wrong otp';
    header('location: ../file/verify.php');
  }

}else{
  $_SESSION['message'] = 'Enter otp';
  header('location: ../file/verify.php');
}

?>