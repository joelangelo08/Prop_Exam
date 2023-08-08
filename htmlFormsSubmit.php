<?php
  include('includes/header.php');
  include('db/conn.php');

  echo '<script>alert("Data Saved Successfully")</script>';

  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $mobileNum = $_POST['mobileNum'];
  $birthDate = $_POST['birthDate'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];

  if(($fullName != '') && ($email != '') && ($mobileNum != '') && ($birthDate != '') && ($age != '') && ($gender != '')){
  $sql = "INSERT INTO `users`(`id`, `fullName`, `email`, `mobileNum`, `birthDate`, `age`, `gender`)
          VALUES (null,' $fullName','$email','$mobileNum','$birthDate','$age','$gender')";
  $result = mysqli_query($conn, $sql);

  }
?>
