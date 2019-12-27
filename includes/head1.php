<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

  <head>
	  	<title>social_network</title>


	 
	 <link rel='stylesheet' href='./style/bootstrap.min.css'/>
	 
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	  	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	  	<link rel='stylesheet' href='./style/navstyle.css'/>
        <link rel='stylesheet' href='./style/hover.css'/>
        <link rel='stylesheet' href='./style/animate.css'/>
  </head>

  <body>
       <!--strat our navbar-->
	   		<nav id="nav"class="navbar navbar-fixed-top">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand hvr-grow-rotate" href="home.php">IQ-Engineering Socity</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">

			      	<?php 
						$user = ($_SESSION['user_email']);
						$get_user = "select * from users where user_email='$user'"; 
						$run_user = mysqli_query($con,$get_user);
						$row=mysqli_fetch_array($run_user);
								
						$user_id = $row['user_id']; 
						$user_name = $row['user_name'];
						$first_name = $row['f_name'];
						$last_name = $row['l_name'];
						$describe_user = $row['describe_user'];
						
						$user_pass = $row['user_pass'];
						$user_email = $row['user_email'];
						
						$user_gender = $row['user_gender'];
						$user_birthday = $row['user_birthday'];
						$user_image = $row['user_image'];
						$user_cover = $row['user_co_image'];
						$recovery_account = $row['recovery_account'];
						$register_date = $row['user_reg_date'];
					?>
			        <li class="active nav-item"><a class="nav-link" href="profile.php">
			        	<i class="fas fa-user hvr-buzz-out"></i>
			        	<span class="sr-only">(current)</span>
			          </a>
			        </li>
			        <li class="nav-item">
			        	<a class="nav-link" href="home.php"><i class="fas fa-home hvr-buzz-out"></i></a>
			        </li>
			        
			        <li class="nav-item">
			        	<a class="nav-link" href="messages.php?u_id=new"><i class="fas fa-envelope-square hvr-buzz-out"><span class="badge badge-danger">1</span></i></a>
			        </li>
		
			  
			      </ul>
			      <form class="navbar-form navbar-left" method="get" action="results.php">
			        <div class="form-group">
			          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="user_query" id="searchbox">

			          <i class="fas fa-search hvr-grow"></i>
			          <button type="submit" class="btn btn-info" name="search">search</button>
			        </div>
			      </form>
			      <ul class="nav navbar-nav navbar-right">
			        <li class="nav-item"><a class="nav-link logouticon" href="logout.php"><i class="fas fa-sign-out-alt hvr-buzz-out"></i></a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
	    </nav>
        <!--end our navbar-->

  		<script src="./js/bootstrap.min.js"></script>
  		<script src="./js/head1.js"></script>
        <script src="./js/wow.js"></script>
        <script> new WOW().init(); </script>
        <script src="./js/jquery.nicescroll.min.js"></script>
 
  </body>
 </html>
