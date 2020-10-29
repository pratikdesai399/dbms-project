<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Profile</title>
</head>
<body>

	<?php include("../include/header.php"); 
	include("../include/connection.php");
	$ad = $_SESSION['admin'];
	$query = "select * from admin where username = '$ad'";

	$res = mysqli_query($connect, $query);

	while($row = mysqli_fetch_array($res)){
		$username = $row['username'];
		$profiles = $row['profile'];
	}

	

	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php include("sidenav.php") ?>
					
				</div>
				<div class="col-md-10">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<h4><?php echo $username; ?> Profile</h4>

								<?php 
								if (isset($_POST['update'])) {
									$profile = $_FILES['profile']['name'];
									if (empty($profile)) {

										# code...
									}else{
										$query = "update admin set profile = '$profile' where username = '$ad'";
										$result = mysqli_query($connect, $query);

										if($result){
											move_uploaded_file($_FILES['profile']['tmp_name'],"img/$profile");
										}




									}
									
								}




								 ?>


								<form method="post" enctype="multipart/form-data">
									<?php 
									echo "<img src='img/$profiles'; ' class='col-md-12' style='height: 200px;'>";


									 ?>
									 <br><br>
									 <div class="form-group">
									 	<label>Update Profile</label>
									 	<input type="file" name="profile" class="form-control">
									 </div>
									 <br>
									 <input type="submit" name="update" value="UPDATE" class="btn btn-success">
									

								</form>
								
							</div>
							<div class="col-md-6">

								<?php 
								if (isset($_POST['change'])) {
									$uname = $_POST['uname'];
									if(empty($uname)){

									}else{
										$query = "update admin set username = '$uname' where username = '$ad'";
										$res = mysqli_query($connect,$query);
										if($res){
											$_SESSION['admin'] = $uname;

										}
									}
									
								}

								 ?>
								<form method="post">
									<label>Change Username</label>
									<input type="text" name="uname" class="form-control"><br>
									<input type="submit" name="change" class="btn btn-success">
								</form>
								<br>
								<br>
								<br>
								<br>
								<form method="post">
									<h5 class="text-center">Change Password</h5>
									<div class="form-group">
										<label>Old Password</label>
										<input type="password" name="old_pass" class="form-control">
									</div>
									<div class="form-group">
										<label>New Password</label>
										<input type="password" name="new_pass" class="form-control">
									</div>

									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" name="con_pass" class="form-control">
									</div>
									<input type="submit" name="" class="btn btn-success">
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