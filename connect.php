<?php

$firstname = filter_input(INPUT_POST, 'fname');
$lastname = filter_input(INPUT_POST, 'lname');
 $password = filter_input(INPUT_POST, 'pass');
 $email=filter_input(INPUT_POST, 'email');
 $phonenumber=filter_input(INPUT_POST, 'mnum');
 $gender=filter_input(INPUT_POST, 'gender');
 $position=filter_input(INPUT_POST, 'position');
 $birthday=filter_input(INPUT_POST, 'u-birthday');
 $newgid=sprintf('%05d',rand(0,999999));
 $username=($firstname."_".$lastname. "_" .$newgid);
 $status="verified";
 $posts="no";
 $profile_pic1="def2.png";



 if (!empty($firstname && $lastname)){
if (!empty($password)){
    
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "social_network";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
  $check_email=$conn->query("SELECT * FROM users WHERE user_email='$email'");
    if($check_email->num_rows > 0){
      echo "<script>alert('Email already exist, Please try using another email')</script>";
      echo "<script>window.open('signup.php', '_self')</script>";
      exit();
    }

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $sql = "INSERT INTO users (position,f_name,l_name,user_name,describe_user,user_pass,user_email,user_address,user_gender,user_birthday,user_image,user_co_image,user_reg_date,posts,status,phone_number)
  values ('$position','$firstname','$lastname','$username','Hello iq.This is my default status!','$password','$email','iraq','$gender','$birthday','$profile_pic1','defcov.jpg',now(),'$posts','$status','$phonenumber')";
  if ($conn->query($sql)){
    echo "<script>alert('Well Done $firstname, you are good to go.conform your registeration by sign in')</script>";
    echo "<script>window.open('main.php#log', '_self')</script>";
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
  $conn->close();
}
}
else{
  echo "<script>alert('Password should not be empty')</script>";
  echo "<script>window.open('signup.php', '_self')</script>";
  die();
}
 }
 else{
  echo "<script>alert('firstname or lastname should not be empty')</script>";
  echo "<script>window.open('signup.php', '_self')</script>";
  die();
 }
