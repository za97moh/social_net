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
	
	<title>edit people </title>
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
        <center><h2 style="margin-top: 66px">Search members</h2></center><br><br>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <form class="search_form" action="">
                    <input autocomplete="off" class="form-control input-lg" type="text" placeholder="search member" name="search_user">
                    <button class="btn btn-info btn-lg" type="submit" name="search_user_btn">search</button>
                </form>
            </div>
            <div class="col-sm-4">
            </div>
        </div><br><br>
        <?php 
            
            global $con;

            if(isset($_GET['search_user_btn'])){
                $search_query=htmlentities($_GET['search_user']);
                $get_user="select * from users where f_name like '%$search_query%' OR l_name like '%$search_query%' OR user_name like '%$search_query%'";

            }
            else{
            $get_user="select * from users where f_name !='admin'";
            }
            $run_user=mysqli_query($con,$get_user);

            while ($row_user=mysqli_fetch_array($run_user)) {
                $user_id=$row_user['user_id'];
                $f_name=$row_user['f_name'];
                $l_name=$row_user['l_name'];
                $username=$row_user['user_name'];
                $user_image=$row_user['user_image'];

                echo "

                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div class='col-sm-6'>
                        <div class='row' id='find_people'>

                            <div class='col-sm-3'>
                                <a href='user_profile2.php?u_id=$user_id'>
                                </a>
                                <img src='users/$user_image' width='150px' height='140px' title='$username' style='float:left; margin:1px;'/>
                            </div><br><br>
                            <div class='col-sm-2'></div>
                            <div class='col-sm-5'>
                                <a style='text-decoration:none;cursor:pointer;color:#3897f0;'href='user_profile2.php?u_id=$user_id'>
                                <strong><h2>$f_name $l_name</h2></strong>
                                </a>
                            </div>
                            <div class='col-sm-2'>
                                <a href='functions/delet_user.php?user_id=$user_id' style='float:right;'><button class='btn btn-danger'>Deletea member</button></a>
                            </div>
                           
                        </div>
                    </div>
                    <div class='col-sm-4'>
                    </div>
                </div><br>

            ";
        }
    
        ?>
    </div>
</div>
  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/head1.js"></script>
        <script src="js/wow.js"></script>
        <script> new WOW().init(); </script>
        <script src="js/jquery.nicescroll.min.js"></script>
</body>
</html>