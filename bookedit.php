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
	
	<title>edit book </title>
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
        <center><h2 style="margin-top: 66px">books & Lecture</h2></center><br><br>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <form class="search_form" action="" method="post">
                    <input autocomplete="off"class="form-control input-lg" type="text" placeholder="search book" name="search_book">
                    <button class="btn btn-info btn-lg" type="submit" name="search_book_btn">search</button>
                    <br>
                  
                </form>
            </div>
            <div class="col-sm-4">
            </div>
        </div><br><br>
        <?php 
    
            global $con;

            if(isset($_POST['search_book_btn'])){
                $search_query=htmlentities($_POST['search_book']);
                $get_user="select * from books where book_name like '%$search_query%' OR book_content like '%$search_query%'";

            }
            else{
                $get_user="select * from books";
            }
            $run_user=mysqli_query($con,$get_user);

            while ($row_user=mysqli_fetch_array($run_user)) {
            $book_id=$row_user['book_id'];
            $book_name=$row_user['book_name'];
            $book_content=$row_user['book_content'];
            $upload_book=$row_user['upload_book'];
            $random_number = rand(1, 100);
            

            echo "

                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div class='col-sm-6'>
                        <div class='row' id='find_people'>
                            <div class='col-sm-4'>
                                <h3 style='margin-top: 8px; color:#6d207f'>$book_content</h3>
                           </div>
                            <div class='col-sm-6'>
                                <a style='font-size: 30px;'href='books/$upload_book'>$book_name</a>
                            </div>
                            <div class='col-sm-2'>
                                <a href='functions/delete_book.php?book_id=$book_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
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

                
