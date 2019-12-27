<?php
	$get_id =$_GET['post_id'];
	$get_con="select * from comments where post_id='$get_id' ORDER by 1 DESC";

	$run_con=mysqli_query($con,$get_con);

	while($row = mysqli_fetch_array($run_con)){
		$con=$row['comment'];
		$con_name=$row['comment_author'];
		$date=$row['date'];

		echo "
			<div class='row'>
				<div class='col-md-6 col-md-offset-3'>
					<div class='panel panel-info'>
						<div class='panel-body'>
							<h4><strong>$con_name</strong><i> commented</i> on $date</h4>
							<p class='text-primary'

							style='margin-left:5px;font-size:20px;'>$con</p>
						</div>
					</div>
				</div>
			</div>

		";
	}
?>