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
        <style>
            label{
                color: #fff;
                background-color: #5d9899;
            }
            
            .addbook{
              width: 510px;
              height: 300px;
              background-color: #637180;
              padding: 30px;


            }
        </style>
     
</head>
<body>
        <div class="row">
            <div class="container-fluid">
                <center>
                    <h2  style="margin-top: 120px;">ADD BOOK & LECTURE</h2>
                    <form action="" method="post"  enctype= "multipart/form-data"class="form-horizontal addbook">
                    
                        <div class="form-group">
                            <label class="col-sm-4 control-lable ">BOOK Name</label>
                            <div class="col-sm-8">
                                <input autocomplete="off" type="text" class="form-control" name="bname"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-lable ">BOOK Content</label>
                            <div class="col-sm-8">
                                <input autocomplete="off" type="text" class="form-control" name="bcontent"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-lable ">Attach file</label>
                            <div class="col-sm-8">
                                <input style="display: block;" type="file" class="form-control" name="fileToUpload" required>
                            </div>
                        </div>
                        <div class="form-group">
                           
                            <div class="col-sm-8">
                                <input type="submit" class="btn btn-danger btn-lg" name="submit" value="ADD">
                            </div>
                        </div>
                   </form>
               </center>
            </div>
        </div>

<?php
if(isset($_POST["submit"]))
{
    global $con;
    global $user_id;

    $name=htmlentities($_POST['bname']);
     $content=htmlentities($_POST['bcontent']);
    $file = $_FILES['fileToUpload']['name'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $random_number = rand(1, 100);

    if(strlen($file) >= 1){
        move_uploaded_file($file_tmp, "books/$file.$random_number");
        $insert = "insert into books (user_id,book_name,book_content, upload_book, book_add_date) values('$user_id','$name','$content', '$file.$random_number', NOW())";
        $run = mysqli_query($con, $insert);
        if($run){
                    echo "<script>alert('Your book added')</script>";
                    echo "<script>window.open('library.php?u_id=$user_id' , '_self')</script>";
                    }  
    }
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