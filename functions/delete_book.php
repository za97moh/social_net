<?php
$con = mysqli_connect("localhost","root","","social_network") or die("Connection was not established");
 
 if(isset($_GET['book_id'])){
 	$book_id=$_GET['book_id'];
 	$delete_book="delete from books where book_id='$book_id'";
 	$run_delete=mysqli_query($con,$delete_book);
 	if($run_delete){
 		echo "<script>alert(' book have been deleted')</script>";

 		echo "<script>window.open('../bookedit.php','_Self')</script>";
 	}
 }
?>