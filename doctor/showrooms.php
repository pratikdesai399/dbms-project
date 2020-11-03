<!DOCTYPE html>
<html>
<head>
	<title>ROOMS</title>
</head>
<body>

	<?php include("../include/header.php");
	include("../include/connection.php"); ?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php include("sidenav.php"); ?>
				</div>
				<div class="col-md-10">
					<h5 class="text-center my-2">ALL ROOMS</h5>

					<?php 

					$query = "select * from room";

					$res = mysqli_query($connect,$query);

					$output = "";


					$output .= "

					<table class='table table-bordered'>
	 				<tr>
	 					<td>ID</td>
	 					<td>TYPE</td>
	 					<td>PATIENT NAME</td>
	 					
	 					<td>Status</td>
	 					

	 				</tr>

	 				";

	 				if(mysqli_num_rows($res)<1){
	 					$output .= "

	 					<tr>
	 						<td class='text-center' colspan='9'>NO ROOMS ALLOTED</td>
	 						

	 					</tr>


	 					";
	 				}

	 				while($row = mysqli_fetch_array($res)){
	 					$output .= "
	 					<tr>
	 						<td>".$row['rid']."</td>
	 						<td>".$row['type']."</td>
	 						<td>".$row['patient']."</td>
	 						<td>".$row['status']."</td>
	 						
	 						

	 					</tr>";
	 				}

	 				$output .= "</tr></table>";

	 				echo $output;



					 ?>
				</div>
			</div>
		</div>
	</div>

</body>
</html>