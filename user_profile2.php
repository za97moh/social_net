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
	
	<title>find people ?></title>
	<meta charset="utf-8">
 	
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	  	<link rel='stylesheet' href='style/navstyle.css'/>
        <link rel='stylesheet' href='style/hover.css'/>
        <link rel='stylesheet' href='style/animate.css'/>
        <link rel="stylesheet" type="text/css" href="style/home_style2.css">

     
</head>
<style>
    #own_posts{
        border:5px solid #e6e6e6;
        padding: 40px 50px;

    }
    #posts_img{
        height: 300px;
        width: 100%;
    }


</style>
<body>
<div class="row">
    <?php
        if(isset($_GET['u_id'])){
        $u_id = $_GET['u_id'];
        }
        if($u_id < 0 || $u_id ==""){
        echo"<script>window.open('home.php','_Self')</script>";  
        }
        else{
    ?>
    <div class="col-sm-12">
        <?php
        if(isset($_GET['u_id'])){
        global $con;
        $user_id =$_GET['u_id'];
        $select="select * from users where user_id='$user_id'";
        $run=mysqli_query($con,$select);
        $row=mysqli_fetch_array($run);
        $name=$row['user_name'];

    }
        ?>

        <?php
            if(isset($_GET['u_id'])){
            global $con;
            $user_id =$_GET['u_id'];
            $select="select * from users where user_id='$user_id'";
            $run=mysqli_query($con,$select);
            $row=mysqli_fetch_array($run);
            

            $id=$row['user_id'];
            $image=$row['user_image'];
            $name=$row['user_name'];
            $f_name=$row['f_name'];
            $l_name=$row['l_name'];
            $describe_user=$row['describe_user'];
            $country=$row['user_address'];
            $gender=$row['user_gender'];
            $register_date=$row['user_reg_date'];

            echo"
                <div class='row'>
                    <div class='col-sm-1'></div>
                    <center>
                        <div style=' top: 105px; background-color:#e6e6e6;' class='col-sm-3'>
                            <h2>Information about</h2>
                            <img class='img-circle' src='users/$image' width='150' height='150'>
                            <br><br>
                            <ul class='list-group'>
                                <li class='list-group-item' title='username'><strong>$f_name $l_name</strong></li>



                                <li class='list-group-item' title='user statues'><strong
                                    style='color:grey;'>$describe_user</strong></li>


                                    <li class='list-group-item' title='gender'><strong>$gender</strong></li>


                                    <li class='list-group-item' title='country'><strong>$country</strong></li>

                                    <li class='list-group-item' title='user regeisteration date'><strong>$register_date</strong></li>
                            </ul>
                       
            ";
            $user=$_SESSION['user_email'];
            $get_user="select * from users where user_email='$user'";

            $run_user=mysqli_query($con,$get_user);
            $row=mysqli_fetch_array($run_user);
            $userown_id=$row['user_id'];

            if($user_id == $userown_id){
            echo"<a href='edit_profile.php?u_id=$userown_id' class='btn btn_success'/>Edit Profile</a><br><br><br>"; 
        }
            echo"
             </div>
            </center>
            ";
          }
        ?>
        <div class="col-sm-8">
            <center><h1 style="margin-top: 80px;"><strong> 
                <?php echo "$f_name $l_name";?>
                    
                </strong></h1>
            </center>
            <?php 
              global $con;
              if(isset($_GET['u_id'])){
                 $u_id =$_GET['u_id'];
              }
              $get_posts="select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
              $run_posts=mysqli_query($con,$get_posts);
              while($row_posts = mysqli_fetch_array($run_posts))
                  {
                    $post_id=$row_posts['post_id'];
                    $user_id=$row_posts['user_id'];
                    $content=$row_posts['post_content'];
                    $upload_image=$row_posts['upload_image'];
                    $post_date=$row_posts['post_date'];
                    $user="select * from users where user_id='$user_id' AND posts='yes'";
                    $run_user=mysqli_query($con,$user);
                    $row_user=mysqli_fetch_array($run_user);
                    $user_name=$row_user['user_name'];
                    $f_name=$row_user['f_name'];
                    $l_name=$row_user['l_name'];
                    $user_image=$row_user['user_image'];

                    if($content=="NO" && strlen($upload_image) >=1){
                        echo"
                            <div id='own_posts'style='    margin-right: 50px;
                        margin-left: 30px;'>
                                <div class='row'>
                                    <div class='col-sm-2'>
                                        <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>

                                    </div>
                                    <div class='col-sm-6'>
                                        <h3><a style='text-decoration:none;cursor:pointer; word-break: break-word;color:#3897f0; ' href='user_profile2.php?u_id=$user_id'>$user_name</a></h3>

                                        <h4><small style='color:black;'>Update a post on <strong>$post_date</strong></small></h4>
                                    </div>
                                    <div class='col-sm-4'>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <img id='posts-img' src='imageposts/$upload_image' style='height:350px'>
                                    </div>

                                </div><br>

                               


                                <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
                            </div></br></br>

                        ";
                    }

                    else if(strlen($content) >=1 && strlen($upload_image) >= 1){
                        echo"
                        <div id='own_posts'style='    margin-right: 50px;
                        margin-left: 30px;'>
                          <div class='row'>
                             <div class='col-sm-4'>
                                    <p><img src='users/$user_image' class='img-circle' width='100px'
                                    height='100px'></p>
                             </div>
                             <div class='col-sm-8'>
                                    <h3><a style='text-decoration:none;
                                     cursor:pointer;color:#3897f0;    word-break: break-word;'
                                     href='user_profile2.php?u_id=$user_id'>
                                     $user_name</a>
                                    </h3>
                                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                             </div>
                             
                          </div>
                          <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='row'>
                                        <div class='col-sm-3'>
                                            <img id='posts-image' <p>$content</p>
                                        </div>
                                        <div class='col-sm-9'>
                                            <img id='posts-img' class='img-responsive' src='imageposts/$upload_image' style='height:350px;'>
                                        </div>
                                    </div>
                                </div>
                          </div><br>


                          <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
                        </div><br>
                        ";

                    }


                    else{
                    echo"
                    <div id='own_posts'style='    margin-right: 50px;
                        margin-left: 30px;'>
                      <div class='row'>
                         <div class='col-sm-4'>
                                <p><img src='users/$user_image' class='img-circle' width='100px'
                                height='100px'></p>
                         </div>
                         <div class='col-sm-8'>
                                <h3><a style='text-decoration:none;
                                 cursor:pointer;color:#3897f0;    word-break: break-word;'
                                 href='user_profile2.php?u_id=$user_id'>
                                 $user_name</a>
                                </h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                         </div>
                         
                      </div>
                      <div class='row'>
                           
                            <div class='col-sm-12'>
                                <h3><img id='posts-image'<p>$content</p></h3>
                            </div>
                        </div><br>
                        <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
                        <br>
                      </div><br><br>
                      
                    ";
                }
            }

            ?>
        </div>

   </div>
</div>
<?php } ?>
      
  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/head1.js"></script>
        <script src="js/wow.js"></script>
        <script> new WOW().init(); </script>
        <script src="js/jquery.nicescroll.min.js"></script>
</body>
</html>