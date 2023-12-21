<?php 
    session_start();
    include_once "config.php";
   

      $email = ($_POST['email']);
      $password = ($_POST['password']);
      $otp  = mt_rand(1111, 9999);
      if(!empty($email) && !empty($password)){
        $sql1 = mysqli_query($conn, "UPDATE `users` SET `otp`='{$otp}' WHERE email = '{$email}'");
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' OR username = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];


              if($user_pass === $enc_pass){

                $_SESSION['otp'] = $row['otp'];
                $_SESSION['unique_id'] = $row['unique_id'];
                $_SESSION['email'] = $row['email'];
                if($otp){
                  $receiver = $email;
                  $subject = "FROM: 2FA cloud system";
                  $body = "Use the otp sent to your email to continue your registration \n "." Name: "." $fname \n Email: "." $email \n "." OTP: $otp";
                  $sender = "FROM: richardsunday0812@gmail.com";

                  if(mail($receiver, $subject, $body, $sender)){
                    $_SESSION["alert"] = "<script>alert('Enter the OTP sent to your email address');</script>";
                    
                      header("location: ../file/login_verify.php?unique_id={$_SESSION['unique_id']}");

                  }
                  else{
                      $_SESSION["message"] = "Check your connnection" . mysqli_error($conn);
                      header("location: ../index.php");
                  }
                }else{
                  $_SESSION['message'] = "Something went wrong. Please try again!";
                  header("location:../index.php");
                }
            }else{
              $_SESSION['message'] = "Email or Password is Incorrect!";
              header("location:../index.php");
              
            }
        }else{
          $_SESSION['message'] = "This email or username does not Exist!";
          header("location:../index.php");
        }
    }else{
      $_SESSION['message'] = "All input fields are required!";
      header("location:../index.php");
    }
    
?>