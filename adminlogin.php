<?php
session_start();

include("include/connection.php");


if(isset($_POST['login'])){
	$username = $_POST['uname'];
	$password = $_POST['pass'];

	$error = array();

	if(empty($username)){
		$error['admin'] = "ENTER USERNAME";
	}else if(empty($password)){
		$error['admin'] = "ENTER PASSWORD";
	}

	if(count($error)==0){
		$query = "select * from admin where username = '$username' and password = '$password'";

		$result = mysqli_query($connect, $query);

		if(mysqli_num_rows($result)==1){
			echo "<script>alert('ADMIN LOGGED IN SUCCESSFULLY')</script>";
			$_SESSION['admin'] = $username;

			header("Location:admin/index.php");
		}else{
			echo "<script>alert('INVALID CREDENTIALS!!')</script>";
		}
	}

	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN</title>
</head>
<body style="background:url(img/hms.jpeg); background-size: cover">
	<?php include("include/header.php")?>
	<div style="margin-top: 30px"></div>

	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 jumbotron">
					<img src="https://www.solarwindsmsp.com/sites/solarwindsmsp/files/blog/2017/10/local_admin_rights.jpg" style="width: 100%">
					<form method="post" class="my-2">

						<div >
							<?php 
							if(isset($error['admin'])){
								$sh = $error['admin'];

								$show = "<h4 class='alert alert-danger'>ENTER CREDENTIALS</h4>	";

								
							}else{
								$show = "";
							}

							echo $show;

							?>
						</div>






						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="ENTER USERNAME">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" placeholder="ENTER PASSWORD">
						</div>

						<input type="submit" name="login" class="btn btn-primary" >
					</form>
				</div>
			</div>
		</div>
	</div>


</body>
</html>