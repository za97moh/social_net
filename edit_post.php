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
		<title><?php echo "$user_name"; ?></title>
	    <meta charset="utf-8">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	  	<link rel='stylesheet' href='style/navstyle.css'/>
        <link rel='stylesheet' href='style/hover.css'/>
        <link rel='stylesheet' href='style/animate.css'/>
        <link rel="stylesheet" type="text/css" href="style/home_style2.css">
	</head>
	<body>
		<div class='row'>
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<?php
					if(isset($_GET['post_id'])){
						$get_id=$_GET['post_id'];

						$get_post="select * from posts where post_id='$get_id'";
						$run_post=mysqli_query($con,$get_post);
						$row=mysqli_fetch_array($run_post);
						$post_con=$row['post_content'];
					}
				?>
				<form action="" method="post" id="f">
					<center><h2 style="margin-top: 100px">Edit Your Post:</h2></center><br>
					<textarea class="form-control" cols="80" rows="4" name="content">
						<?php
						  echo "$post_con";
						?>
					</textarea><br>
					<input type="submit" name="update" value="Update post" class="btn btn-danger"/>
				</form>

				<?php
					if(isset($_POST['update'])){
						$content=$_POST['content'];

						$update_post="update posts set post_content='$content' where post_id='$get_id'";
						$run_update=mysqli_query($con,$update_post);
						if($run_update){
							echo "<script>alert(' Apost have been updated')</script>";

 							echo "<script>window.open('home.php','_self')</script>";
						}
					}
				?>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</body>
</html>