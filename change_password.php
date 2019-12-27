<!DOCTYPE html>
<?php
session_start();
include("includes/connection.php");
include("functions/functions.php");

if(!isset($_SESSION['user_email'])){
    header("location: index.php");
}
?>
<html>
<head>
	<title>forgot password</title>
	<meta charset="utf-8">
 	<link rel='stylesheet' href='style/bootstrap.css'/>
    
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	  	<link rel='stylesheet' href='style/navstyle.css'/>
        <link rel='stylesheet' href='style/hover.css'/>
        <link rel='stylesheet' href='style/animate.css'/>
          
</head>
<style >
    body{
        overflow-x: hidden;
        background-color: #333333;
    }
    .main-content{
        width:60%;
        height: 50%;
        margin:10px auto;
        background-color: #EDF0F2;
        border: 5px solid #31B0D5;
        padding: 40px 50px;
    }
    .header{
        border:0px solid #000;
        margin-bottom: 5px;
    }
    .well{
        background-color: #081444;
    }
    #signup{
        width: 70%;
        border-radius: 30px;
    }
</style>
<body>
    
<div class="row">
	<div class="col-sm-12">
        <div class="well">
            <center><h1 style="color:white;"><STRONG>IQ_ENGINEERING_SOCITY</STRONG></h1></center>

        </div>   
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="main-content">
            <div class="header">
                <h3 style="text-decoration: center;"><strong>CHANGE PASSWORD</strong></h3><HR>  

            </div>
            <div class="l_pass">
                <form action="" method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

                        <input id="password" class="form-control" type="password" name="pass" placeholder="new password"
                        required>
                    </div><br>
                    
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

                        <input id="password" type="password" class="form-control" name="pass1" placeholder="re-enter new password"
                        required>                    
                    </div><br>

                    
                    <center><button id="signup" class="btn btn-info btn-lg" name="change">change password</button></center>

                </form>
            </div>
        </div>
    </div>
</div>
  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/head1.js"></script>
        <script src="js/wow.js"></script>
        <script> new WOW().init(); </script>
        <script src="js/jquery.nicescroll.min.js"></script>
</body>
</html>
<?php

    if (isset($_POST['change'])) {

            $pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
            $pass1=htmlentities(mysqli_real_escape_string($con, $_POST['pass1']));

            if($pass == $pass1)
            {
                if(strlen($pass) >=6 && strlen($pass) <= 60){
                $update="update users set user_pass='$pass' where user_id='$user_id'";
                $run= mysqli_query($con, $update);

                echo"<script>alert(' your password is changed a moment ago ')</script>";
                echo"<script>window.open('home.php','_self')</script>";

            }
            else
            {
                echo"<script>alert(' your password should be greator than 6 words ')</script>";
            }
        }
        else
        {
           echo"<script>alert(' your password did not match ')</script>";
                echo"<script>window.open('change_password.php','_self')</script>"; 
        }
    }
?>