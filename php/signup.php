<?php
session_start();
include_once("config.php");


$fname = $_POST["fname"];
$username = $_POST["username"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$ran_id = rand(time(), 100000000);
$otp  = mt_rand(1111, 9999);

if(!empty($fname) && !empty($username) && !empty($email) && !empty($phone)){
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
      if(mysqli_num_rows($sql) > 0){
        $_SESSION["message"] = "$email - This email already exist!";
      }else{
                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, name, username, email, phone, otp)
                VALUES ({$ran_id}, '{$fname}', '{$username}','{$email}', '{$phone}', $otp)");
                if($insert_query){
                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                    if(mysqli_num_rows($select_sql2) > 0){
                        $row = mysqli_fetch_assoc($select_sql2);
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
                            
                              header("location: ../file/verify.php?unique_id={$_SESSION['unique_id']}");

                          }
                          else{
                              $_SESSION["message"] = "email problem" . mysqli_error($conn);
                              header("location: ../register.php");
                          }
                        }
                    }else{
                        $_SESSION["message"] = "This email address not Exist!";
                        header("location: ../register.php");
                    }
                }else{
                    $_SESSION["message"] = "Something went wrong. Please try again!";
                    header("location: ../register.php");
                }
                      
                          }
                      }else{
                          $_SESSION["message"] = "$email is not a valid email!";
                          header("location: ../register.php");
                      }
                    }else{
                        $_SESSION["message"] = "All input fields are required!";
                        header("location: ../register.php");
                      
                    }
