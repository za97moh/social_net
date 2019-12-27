<!DOCTYPE html>
<?php
session_start();
include("includes/head1.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	<?php
		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
	?>
	<title><?php echo "$user_name"; ?></title>
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
    .library{
    	margin:8px;
    }
	#cover-img{
		height: 400px;
		width: 100%;
	}#profile-img{
		position: absolute;
		top: 160px;
		left: 60px;
	}
	#update_profile{
		position: relative;
		top: -33px;
		cursor: pointer;
		left: 93px;
		border-radius: 4px;
		background-color: rgba(0,0,0,0.1);
		transform: translate(-50%, -50%);
	}
	#button_profile{
		position: absolute;
		top: 82%;
		left: 50%;
		cursor: pointer;
		transform: translate(-50%, -50%);
	}
	#own_posts{
		border:5px solid #e6e6e6;
		padding:40px 50px;
		margin-top: 20px;
		background-color: #b7c2ce;
	}
	#post_img{
		height:300px;
		width:100%;
	}
	.heddien{
		margin-top:10px;
	}

</style>
<body>
<div class="row">
	<div class="col-sm-1">
	</div>
	<div class="col-sm-10">
		<?php
			echo"
			<div>
				<div><img id='cover-img' class='img-rounded' src='cover/$user_cover' alt='cover'></div>
				<form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>

						<ul class='nav pull-left' style='position:absolute;top:70px;left:40px;'>
							<li>
								<div>
									<center>
									<label class='btn btn-success'> Select Cover
									<input type='file' name='u_cover' size='60' />
									</label><br><br>
									<button name='submit' class='btn btn-success'>Update Cover</button>
									</center>
								</div>
					        </li>

				         </ul>

				</form>
			</div>
			<div class='row'>
				
				<div id='profile-img'>
					<img src='users/$user_image' alt='Profile' class='img-circle image-responsive' width='166px' height='160px'>
					<form action='profile.php?u_id='$user_id' method='post' enctype='multipart/form-data'>

					<label id='update_profile'> Select Profile
					<input type='file' name='u_image' size='60' />
					</label><br><br>
					<button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
					</form>

				</div><br>
			</div>
			";

		?>
		<?php

			if(isset($_POST['submit'])){

				$u_cover = $_FILES['u_cover']['name'];
				$image_tmp = $_FILES['u_cover']['tmp_name'];
				$random_number = rand(1,100);

				if($u_cover==''){
					echo "<script>alert('Please Select Cover Image')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "cover/$u_cover.$random_number");
					$update = "update users set user_co_image='$u_cover.$random_number' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					echo "<script>alert('Your Cover Updated')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}

			}

		?>
	</div>


	<?php
		if(isset($_POST['update'])){

				$u_image = $_FILES['u_image']['name'];
				$image_tmp = $_FILES['u_image']['tmp_name'];
				$random_number = rand(1,100);

				if($u_image==''){
					echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "users/$u_image.$random_number");
					$update = "update users set user_image='$u_image.$random_number' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					echo "<script>alert('Your Profile Updated')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}

			}
	?>
	<div class="col-sm-1">
	</div>
</div>
<div class="row">
	<div class="col-sm-1">
	</div>
	<div class="col-sm-10" style="background-color: #e6e6e6;text-align: center;border-radius: 10px;">
		<?php
		echo"
		 <div class='row'>
			<div class='col-sm-12'><h2 class='heddien'><strong>About</strong></h2></div>
			<div class='col-sm-12'><h4><strong>$first_name $last_name</strong></h4></div>
			<p class='col-sm-12'><strong><i style='color:grey;'>$describe_user</i></strong></p><br>
			
			<p class='col-sm-4'><strong>Member Since: </strong> $register_date</p><br>
			<p class='col-sm-4'><strong>Gender: </strong> $user_gender</p><br>
			<p class='col-sm-4'><strong>Date of Birth: </strong> $user_birthday</p><br>
		 </div>
		";
		?>
	</div>
	<div class="col-sm-1">
	</div>
</div>
<div class="row">
	<?php
		global $con;
		$addbook="select * from users where user_id='$user_id' and position='1'";
		$run_addbook =mysqli_query($con, $addbook);
		$row_addbook = mysqli_fetch_array($run_addbook);

		if($row_addbook > 0){  
		
			echo
			"
				<div class='col-sm-5'></div>
				<div class='col-sm-2 library'>
	 				<a href='addbook.php?' class='btn btn-success'>ADD BOOK <i class='fas fa-star'></i></a>
				</div>
				<div class='col-sm-5'></div>	
			";
		}
		
	?>
	
</div>

<div class="col-sm-2 ">	
</div>
<div class="col-sm-8">
	<?php
	global $con;
	//if(isset($_GET['user_id'])) {
		//$u_id = $_GET['user_id'];
	//}
	$get_posts = "select * from posts where user_id='$user_id' ORDER by 1 DESC LIMIT 5";
	$run_posts =mysqli_query($con, $get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$post_id = $row_posts['post_id'];
		$user_id =$row_posts['user_id'];
		$content =$row_posts['post_content'];
		$upload_image =$row_posts['upload_image'];
		$post_date =$row_posts['post_date'];
		$user = "select * from users where user_id='$user_id' AND posts='yes'";
		$run_user =mysqli_query($con, $user);
		$row_user= mysqli_fetch_array($run_user);
		$user_name=$row_user['user_name'];
		$user_image=$row_user['user_image'];

		if($content == "NO" && strlen($upload_image) >= 1){
			echo"
			<div id='own_posts'>
			  <div class='row'>
			     <div class='col-sm-4'>
				        <p><img src='users/$user_image' class='img-circle' width='100px'
				        height='100px'></p>
			     </div>
			     <div class='col-sm-8'>
					    <h3><a style='text-decoration:none;
					     cursor:pointer;color:#3897f0;    word-break: break-word;'
					     href='user_profile.php?u_id=$user_id'>
					     $user_name</a>
					    </h3>
					    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
			     </div>
			     
			  </div>
			  <div class='row'>
			  		<div class='col-sm-12'>
			  			<div class='col-sm-3'>
			  					<img id='posts-image' <p>$content</p>
			  				</div>
			  				<div class='col-sm-9'>
			  					<img id='posts-img' class='img-responsive' src='imageposts/$upload_image' style='height:350px;'>
			  				</div>
			  		</div>
			  </div><br>
			  <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>view</button></a>


			  <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
			</div><br>
			";

		}


		else if(strlen($content) >=1 && strlen($upload_image) >= 1){
			echo"
			<div id='own_posts'>
			  <div class='row'>
			     <div class='col-sm-4'>
				        <p><img src='users/$user_image' class='img-circle' width='100px'
				        height='100px'></p>
			     </div>
			     <div class='col-sm-8'>
					    <h3><a style='text-decoration:none;
					     cursor:pointer;color:#3897f0;    word-break: break-word;'
					     href='user_profile.php?u_id=$user_id'>
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
			  <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>view</button></a>


			  <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
			</div><br>
			";

		}

		else{
			echo"
			<div id='own_posts'>
			  <div class='row'>
			     <div class='col-sm-4'>
				        <p><img src='users/$user_image' class='img-circle' width='100px'
				        height='100px'></p>
			     </div>
			     <div class='col-sm-8'>
					    <h3><a style='text-decoration:none;
					     cursor:pointer;color:#3897f0;    word-break: break-word;'
					     href='user_profile.php?u_id=$user_id'>
					     $user_name</a>
					    </h3>
					    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
			     </div>
			     
			  </div>
			  <div class='row'>
			  		<div class='col-sm-2'>
			  		</div>
			  		<div class='col-sm-6'>
			  			<h3><img id='posts-image'<p>$content</p></h3>
			  		</div>
			  		<div class='col-sm-4'>
			  		</div>
			  </div>
			  
			";
			global $con;
			$get_posts="select user_email from users where user_id='$user_id'";
			$run_user=mysqli_query($con,$get_posts);
			$row_posts=mysqli_fetch_array($run_user);

			$user_email=$row['user_email'];
			$user=$_SESSION['user_email'];
			$get_user="select * from users where user_email='$user'";
			$run_user=mysqli_query($con,$get_user);
			$row=mysqli_fetch_array($run_user);

			$user_id=$row['user_id'];
			$u_email =$row['user_email'];

			if($u_email != $user_email){
				echo "<script>window.open('profile.php?user_id=$user_id','_self)</script>";
			}else{
				echo "
					 <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>view</button></a>

					 <a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Edit</button></a>

			       <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
			       </div> <br><br><br>


				";
			}


		}
		include("functions/delete_post.php");

	}
	?>
</div>
<div class="col-sm-2">
</div>

  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/head1.js"></script>
  		<script src="js/instructor.js"></script>
        <script src="js/wow.js"></script>
        <script> new WOW().init(); </script>
        <script src="js/jquery.nicescroll.min.js"></script>
</body>
</html>