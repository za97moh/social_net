<!DOCTYPE html>
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
                <h3 style="text-decoration: center;"><strong>fORGOT PASSWORD</strong></h3><HR>  

            </div>
            <div class="l_pass">
                <form action="" method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

                        <input id="email" class="form-control" type="email" name="email" placeholder="Enter your Email"
                        required>
                    </div><br>
                    <hr>
                    <pre class="text">Enter one of your instructor name </pre>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>

                        <input id="msg" type="text" class="form-control" name="recover_account" placeholder="write here "
                        required>                    
                    </div><br>

                    <a style="text-decoration: none; float:right; color: #187fab;" data-toggle="tooltip" title="signin" href="main.php#log">Back to signin></a><br><br>
                    <center><button id="signup" class="btn btn-info btn-lg" name="submit">submit</button></center>

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
session_start();

include("includes/connection.php");

    if (isset($_POST['submit'])) {

        $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
        $recovery_account=htmlentities(mysqli_real_escape_string($con, $_POST['recovery_account']));

        $select_user = "select * from users where user_email='$email' AND recovery_account='$recovery_account'";
        $query= mysqli_query($con, $select_user);
        $check_user = mysqli_num_rows($query);

        if($check_user == 1){
            $_SESSION['user_email'] = $email;

            echo "<script>window.open('change_password.php', '_self')</script>";
        }else{
            echo"<script>alert('Your Email or beast friend name is incorrect')</script>";
            echo "<script>window.open('main.php #log','_self')</script>";
        }
    }
?>