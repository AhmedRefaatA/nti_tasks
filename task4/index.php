






<?php  
session_start();

 echo 'Name  : ' . $_SESSION['student']['name'].'<br>';
 echo 'EMAIL : ' . $_SESSION['student']['email'].'<br>';
 echo 'Linkedin : ' . $_SESSION['student']['email'].'<br>';
 echo 'Address : ' . $_SESSION['student']['email'].'<br>';
 echo 'Gender : ' . $_SESSION['student']['email'].'<br>';
 $profile = $_SESSION["student"]["profile"];
echo "profile  <img src='./uploads/$profile'/>";

?>
