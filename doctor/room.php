<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Room</title>
</head>
<body>

	<?php include("../include/header.php");

		include("../include/connection.php");


	 ?>

	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-2" style="margin-left: -30px;"><?php include("sidenav.php"); ?></div>
	 			<div class="col-md-10">
	 				
	 				<h5 class="text-center my-2">TOTAL ROOMS</h5>

	 				<?php 

	 				$p = $_SESSION['patient'];



					$query = "insert into room(type, patient) values()";

					$res = mysqli_query($connect,$query);

					$output = "";


					$output .= "

					<table class='table table-bordered'>
	 				<tr>
	 					<td>ID</td>
	 					<td>TYPE</td>
	 					<td>PATIENT</td>
	 					<td>
	 					
	 					

	 				</tr>

	 				";

	 				if(mysqli_num_rows($res)<1){
	 					$output .= "

	 					<tr>
	 						<td class='text-center' colspan='9'>NO ROOMS ASSIGNMED</td>
	 						

	 					</tr>


	 					";
	 				}

	 				while($row = mysqli_fetch_array($res)){
	 					$output .= "
	 					<tr>
	 						<td>".$row['rid']."</td>
	 						<td>".$row['type']."</td>
	 						<td>".$row['patient']."</td>
	 						
	 						<td>
	 						<a href='discharge.php?id=".$row['id']."'>
	 						<button class='btn btn-info'>Check</button>

	 						</a>

	 						</td>

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