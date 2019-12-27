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
	<title>edit post</title>
	<meta charset="utf-8">
 	<link rel='stylesheet' href='style/bootstrap.css'/>
    
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
	<center style=" margin-top: 30px;margin-bottom: 30px;
    height: 50px;"><h2>posts</h2>
    <form class="form" method="get" action="results2.php">
        <input class= type="text" placeholder="Search" name="user_query" id="searchbox">
        <button type="submit" class="btn btn-info" name="search">search</button>
    </form>
</center>
    <?php 
        global $con;

        
        $get_posts ='select * from posts';
        $run_posts = mysqli_query($con, $get_posts);

        while($row_posts=mysqli_fetch_array($run_posts)){
            $post_id = $row_posts['post_id'];
            $user_id = $row_posts['user_id'];
            $content = $row_posts['post_content'];
            $upload_image = $row_posts['upload_image'];
            $post_date = $row_posts['post_date'];

            $user="select * from users where user_id='$user_id'AND posts='yes'";

          $run_user=mysqli_query($con,$user);
          $row_user=mysqli_fetch_array($run_user);
         
            $user_name = $row_user['user_name'];
            $first_name = $row_user['f_name'];
            $last_name = $row_user['l_name'];

            $user_image = $row_user['user_image'];
            //displaying posts 

            if($content=="No" && strlen($upload_image) >= 1)
            {
                echo"
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-4'>
                            <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-8'>
                                <h3><a style='text-decoration:none; cursor:pointer;color #3897f0; word-break: break-word;' href='user_profile2.php?u_id=$user_id'>$user_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <img id='posts-img'class='img-responsive'  src='imageposts/$upload_image' style='height:350px;'>
                            </div>
                        </div><br>
                        <a href='functions/delete_post_admin.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
                ";
            }

            else if(strlen($content) >= 1 && strlen($upload_image) >= 1)
            {
                echo"
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-4'>
                            <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-8'>
                                <h3><a style='text-decoration:none; word-break: break-word; cursor:pointer;color #3897f0;' href='user_profile2.php?u_id=$user_id'>$user_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <p>$content</p>
                                <img id='posts-img' class='img-responsive' src='imageposts/$upload_image' style='height:350px;'>
                            </div>
                        </div><br>
                        <a href='functions/delete_post_admin.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
                ";
            }

            else
            {
                echo"
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-4'>
                            <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-8'>
                                <h3><a style='text-decoration:none;word-break: break-word; cursor:pointer;color #3897f0;' href='user_profile2.php?u_id=$user_id'>$user_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <h3><p>$content</p></h3>
                            </div>
                        </div><br>
                        <a href='functions/delete_post_admin.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
                ";
            }

        }
    


    ?>
</div>
  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/head1.js"></script>
        <script src="js/wow.js"></script>
        <script> new WOW().init(); </script>
        <script src="js/jquery.nicescroll.min.js"></script>
</body>
</html>