<!DOCTYPE html>
<?php
session_start();
include("includes/head1.php");
include("functions/functions.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	
	<title>find people ?></title>
	<meta charset="utf-8">
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	  	<link rel='stylesheet' href='style/navstyle.css'/>
        <link rel='stylesheet' href='style/hover.css'/>
        <link rel='stylesheet' href='style/animate.css'/>
        <link rel="stylesheet" type="text/css" href="style/home_style2.css">
     
</head>
<body>
<div class="row">
    <div class="col-sm-12">
        <center><h2 style="margin-top: 66px">Find new people</h2></center><br><br>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <form class="search_form" action="">
                    <input autocomplete="off" class="form-control input-lg" type="text" placeholder="search friend" name="search_user">
                    <button class="btn btn-info btn-lg" type="submit" name="search_user_btn">search</button>
                </form>
            </div>
            <div class="col-sm-4">
            </div>
        </div><br><br>
        <?php search_user();?>
    </div>
</div>
  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/head1.js"></script>
        <script src="js/wow.js"></script>
        <script> new WOW().init(); </script>
        <script src="js/jquery.nicescroll.min.js"></script>
</body>
</html>