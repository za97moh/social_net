<!DOCTYPE html>
<?php
session_start();

include("functions/functions.php");

if(!isset($_SESSION['user_email'])){
    header("location: index.php");
}
?>
<html>
<head>
	
	<title>admin setting</title>
	<meta charset="utf-8">
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	  	<link rel='stylesheet' href='style/navstyle.css'/>
        <link rel='stylesheet' href='style/hover.css'/>
        <link rel='stylesheet' href='style/animate.css'/>
        <link rel="stylesheet" type="text/css" href="style/home_style2.css">
     
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
   
    .well{
        background-color: #081444;
    }
  
    </style>
     <script > 
            function member(){
                window.open("memberedit.php","_self");
            }

            function post(){
                window.open("postedit.php","_self");
            }
            function book(){
                window.open("bookedit.php","_self");
            }
            function logout(){
                window.open("logout.php","_self");
            }
        </script>
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
            <center><h2 style="width:60%;color:#4b4bd2">Edit members</h2></center>
            <center><button onclick="member()" class="btn btn-danger btn-lg"name="members">members</button></center>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="main-content">
            <center><h2 style="width:60%;color:#4b4bd2">Edit posts</h2></center>
            <center><button onclick="post()" class="btn btn-info btn-lg" name="posts">posts</button></center>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="main-content">
            <center><h2 style="width:60%;color:#4b4bd2">Edit books</h2></center>
            <center><button onclick="book()" class="btn btn-success btn-lg"name="book">books</button></center>
        </div>
    </div>
</div>
<div class="col-sm-12"><center><button style="padding: 10px;margin: 16px;" onclick="logout()" class="btn btn-lg btn-danger">Log out</button></center></div>


  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/head1.js"></script>
        <script src="js/wow.js"></script>
        <script> new WOW().init(); </script>
        <script src="js/jquery.nicescroll.min.js"></script>
</body>
</html>

                
