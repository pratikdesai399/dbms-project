<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
</head>
<body>

	<?php

	include("../include/header.php");
	include("../include/connection.php");

	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php 
					include("sidenav.php"); ?>
				</div>


				<div class="col-md-10">
					<h5 class="my-2">ADMIN DASHBOARD</h5>
					<div class="col-md-12 my-1">
						<div class="row">
							<div class="col-md-3 bg-success mx-2" style="height: 130px;">

								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php

											$ad = mysqli_query($connect,"select * from admin"); 
											$num = mysqli_num_rows($ad);


											 ?>
											<h5 class="my-2 text-white " style="font-size: 30px;"><?php echo $num ?></h5>
											<h5 class="text-white">Total</h5>
											<h5 class="text-white">Admins</h5>
										</div>
										<div class="col-md-4">
											<a href="admin.php"><i class="fa fa-user-cog fa-3x my-4" style="color: white;"></i></a>
											
										</div>
									</div>
								</div>



								
							</div>
							<div class="col-md-3 bg-info mx-2" style="height: 130px;">

								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php
												$doctors = mysqli_query($connect, "select * from doctor where status='Approved' ");
												$num2 = mysqli_num_rows($doctors);

											?>
											<h5 class="my-2 text-white " style="font-size: 30px;"><?php echo $num2;?></h5>
											<h5 class="text-white">Total</h5>
											<h5 class="text-white">Doctors</h5>
										</div>
										<div class="col-md-4">
											<a href="#"><i class="fa fa-user-md fa-3x my-4" style="color: white;"></i></a>
											
										</div>
									</div>
								</div>
								


								
							</div>
							<div class="col-md-3 bg-warning mx-2" style="height: 130px;">

								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<h5 class="my-2 text-white " style="font-size: 30px;">0</h5>
											<h5 class="text-white">Total</h5>
											<h5 class="text-white">Patients</h5>
										</div>
										<div class="col-md-4">
											<a href="#"><i class="fa fa-user-injured fa-3x my-4" style="color: white;"></i></a>
											
										</div>
									</div>
								</div>
								


								
							</div>


							<div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">

								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">

											<?php 

											$r = mysqli_query($connect,"select * from report");
											$rr = mysqli_num_rows($r);

											 ?>
											<h5 class="my-2 text-white " style="font-size: 30px;"><?php echo $rr; ?></h5>
											<h5 class="text-white">Total</h5>
											<h5 class="text-white">Reports</h5>
										</div>
										<div class="col-md-4">
											<a href="report.php"><i class="fa fa-flag fa-3x my-4" style="color: white;"></i></a>
											
										</div>
									</div>
								</div>
								


								
							</div>
							<div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">

								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8" >
											<?php
												$job = mysqli_query($connect, "select * from doctor where status='Pending'");
												$num1 = mysqli_num_rows($job);
											?>
											<h5 class="my-2 text-white " style="font-size: 30px;"> <?php echo $num1; ?> </h5>
											<h5 class="text-white">Total</h5>
											<h5 class="text-white">Job Requests</h5>
										</div>
										<div class="col-md-4">
											<a href="job_request.php"><i class="fa fa-edit fa-3x my-4" style="color: white;"></i></a>
											
										</div>
									</div>
								</div>
								


								
							</div>
							<div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">

								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">

											<?php 
											$in = mysqli_query($connect,"select sum(amount_paid) as profit from income");
											$row = mysqli_fetch_array($in);
											$inc = $row['profit'];


											 ?>

											
											
											<h5 class="my-2 text-white " style="font-size: 30px;"><?php echo "Rs $inc"; ?></h5>
											<h5 class="text-white">Total</h5>
											<h5 class="text-white">Income</h5>
										</div>
										<div class="col-md-4">
											<a href="income.php"><i class="fa fa-rupee-sign fa-3x my-4" style="color: white;"></i></a>
											
										</div>
									</div>
								</div>
								


								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

</body>
</html>