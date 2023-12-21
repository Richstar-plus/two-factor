<?php
$conn = new mysqli('localhost', 'root', '', '2fa');

if(!$conn){
  echo 'connection denied' . mysqli_connect_error();
}

?>