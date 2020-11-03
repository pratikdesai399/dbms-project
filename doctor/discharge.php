<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Discharge</title>
</head>
<body>

	<?php 

	include("../include/header.php");
    include("../include/connection.php");

	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;"><?php include("sidenav.php"); ?></div>
				<div class="col-md-10">
					
					<h5 class="text-center my-2">Total Appointments</h5>

					<?php 

					if(isset($_GET['id'])){
						$id = $_GET['id'];

						$query = "select * from appointment where id = '$id'";

						$res = mysqli_query($connect,$query);

						$row = mysqli_fetch_array($res);


					}

					



					 ?>


					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<table class="table table-bordered">
									<tr>
										<td colspan="2" class="text-center">Appointment Details</td>
										

									</tr>
									<tr>
										<td>Firstname</td>
										<td><?php echo $row['firstname']; ?></td>
									</tr>
									<tr>
										<td>Surname</td>
										<td><?php echo $row['surname']; ?></td>
									</tr>
									<tr>
										<td>Gender</td>
										<td><?php echo $row['gender']; ?></td>
									</tr>
									<tr>
										<td>Phone No</td>
										<td><?php echo $row['phone']; ?></td>
									</tr>
									<tr>
										<td>Appointment Date</td>
										<td><?php echo $row['appointment_date']; ?></td>
									</tr>
									<tr>
										<td>Symptoms</td>
										<td><?php echo $row['symptoms']; ?></td>
									</tr>
									
								</table>

								
							</div>
							<div class="col-md-6">
								<h5 class="text-center my-1">Invoice</h5>

								<?php 

								if(isset($_POST['send'])){

									$fee = $_POST['fee'];
									$des = $_POST['des'];

									if(empty($fee)){

									}else if(empty($des)){

									}else{

										$doc = $_SESSION['doctor'];
										
										$fname = $row['firstname'];

										$query = "insert into income(doctor,patient,date_discharge,amount_paid,description) values('$doc','$fname',NOW(),'$fee','$des')";

										$res = mysqli_query($connect,$query);

										if($res){
											echo "<script>alert('You have sent an INVOICE')</script>";

											mysqli_query($connect,"update appointment set status='Discharged' where id = '$id'");
											mysqli_query($connect,"delete from room where patient = '$fname'");
										}


									}

								}

								if(isset($_POST['roomtype'])){
									$type = $_POST['type'];

									$fname = $row['firstname'];

									$query = "insert into room(type,patient,status) values('$type','$fname','Occupied')";

									$res = mysqli_query($connect,$query);
									if($res){
											echo "<script>alert('Room has been assigned')</script>";

											
										}
								}





								 ?>

								<form method="post">
									<label>Fee</label>
									<input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter Patient Fees">

									<label>Description</label>
									<input type="text" name="des" class="form-control" autocomplete="off" placeholder="Enter Description">

									<input type="submit" name="send" class="btn btn-info my-2" value="Send">
								</form>
								<br>
								<br>
								<br>
								<form method="post">

									<select class="form-control" name="type">
										<option>SELECT ROOM TYPE</option>
										<option value="Single Room">Single Room</option>
										<option value="Shared Room">Shared Room</option>
									</select>
									<br>
									

									<label>Assign Room</label>

									<input type="submit" name="roomtype" class="btn btn-success my-2">
									
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>