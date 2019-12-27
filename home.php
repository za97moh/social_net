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
	<?php
		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
	?>
	<title><?php echo "$user_name"; ?></title>
	<meta charset="utf-8">
 	<link rel='stylesheet' href='style/bootstrap.css'/>
    
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	  	<link rel='stylesheet' href='style/navstyle.css'/>
        <link rel='stylesheet' href='style/hover.css'/>
        <link rel='stylesheet' href='style/animate.css'/>
        <link rel="stylesheet" type="text/css" href="style/home_style2.css">
        <script > 
            function library(){
                window.open("library.php","_self");
            }

        </script>

        <style type="text/css">
        body{background-color: #ffff;}

.carousel{
    background: #2f4357;
    margin-top: 60px;
    width: 900px;
    left: 80px;
}
.carousel .item{
    min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
}
.carousel .item img{
    height: 310px
     /* Align slide image horizontally center */
}
.bs-example{
	margin: 20px;
    margin-left: 157px;
    margin-right: 113px;
}
hr{
 border-top: 3px solid #eee;
}
.library {
  position: fixed;
  top: 500px;
  left: 15px;
  z-index: 9999;
}

.library .book .btn-click{
    background:#637180;
  float: left;
  padding:10px;
  color:#000;
   height: 80px;
  width: 95px;
  border-radius: 50px;
  border: 1px solid #172c2c;
}
.library .book .btn-click .fa-book{
    font-size: 35px;
    font-color: #ffff;
    color: #050825;
}

@media(min-width: 992px) and (max-width: 1199px)/*medium*/
{
   .carousel{
    width: 700px;
    left: 60px;
   }
}


@media(min-width: 768px) and (max-width: 991px) /*from 768 to 991 small*/
{
	 .carousel{
    width: 620px;
    left: 19px;
   }
}
@media(max-width: 767px){
	h2{
		margin-top: 50px;
	}
}
}
</style>

        
</head>
<body>
   
    <section class="library">
      <div class="book">
          <button onclick="library()" class="btn-click" name="submit"><i class="fas fa-book"></i></button>
      </div>
    </section>
<div class="bs-example hidden-xs">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <img class="center-block" src="images/news3.jpg" alt="First Slide">
                <div class="carousel-caption hidden-xs">
				   <h1>Graduation 2018</h1>
				    <p class="lead">graduation for year 2019
				    	<a href="https://aliraqia.edu.iq/engineering/cat/2">READ MORE</a></p>
				</div>
            </div>
            <div class="item center-block">
                <img src="images/news1.jpg" alt="Second Slide">
                <div class="carousel-caption hidden-xs">
				   <h1>Statistical Workshop</h1>
				    <p class="lead">The Iraqi University College of Engineering held a workshop<a href="https://www.aliraqia.edu.iq/engineering/view/8008">READ More</a></p>
				</div>
            </div>
            <div class="item">
                <img class="center-block"src="images/news5.jpg" alt="Third Slide">
                <div class="carousel-caption hidden-xs">
				   <h1>Volunteering Family Engineering</h1>
				    <p class="lead"><a href="https://www.aliraqia.edu.iq/engineering">Read More</a></p>
				</div>
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
<div class="row">
	<div class="col-sm-12">
		<hr>
		<center><h2><strong>Find AND Follow More Friends</strong></h2>
			<h3><a href="member.php">click here</a><i class="fas fa-user-plus" style="margin-left: 10px;
             font-size: 25px;
             color: #3C658A;">
                 
             </i></h3>
		</center>
	</div>
</div>
<div class="row">
	<div id="insert_post" class="col-sm-12">
		<center>
		<form action="home.php?id=<?php echo $user_id; ?>" method="post" id="f" enctype="multipart/form-data">
		<textarea class="form-control" id="content" rows="4" name="content" placeholder="What's in your mind?"></textarea><br>
		<label class="btn btn-danger" id="upload_image_button">Select Image
		<input type="file" name="upload_image" size="30">
		</label>
		<button id="btn-post" class="btn btn-success" name="sub">Post</button>
		</form>
		<?php insertPost(); ?>
		</center>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<center ><h2><strong>Latest Posts</strong></h2><br></center>
		
		<?php echo get_posts(); ?>
	
	</div>
</div>
  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/head1.js"></script>
        <script src="js/wow.js"></script>
        <script> new WOW().init(); </script>
        <script src="js/jquery.nicescroll.min.js"></script>
</body>
</html>
