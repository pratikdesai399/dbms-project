
<?php 
session_start();

include("include/connection.php");

if(isset($_POST['login'])){
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];

	if(empty($uname)){
		echo "<script>alert('Enter Username')</script>";

	}else if(empty($pass)){
		echo "<script>alert('Enter Password')</script>";

	}else{
		$query = "SELECT * FROM patient WHERE username = '$uname' AND password = '$pass'";

		$res = mysqli_query($connect,$query);
		if(mysqli_num_rows($res)==1){
			header("Location: patient/index.php");

			$_SESSION['patient'] = $uname;


		}else{
			echo "<script>alert('Invalid Credentials')</script>";
		}
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient Login</title>
</head>
<body style="background-image: url(img/back.jpg); background-repeat: no-repeat; background-size: cover;">
	<?php include("include/header.php"); ?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 my-5 jumbotron">
					<h5 class="text-center">Patient Login</h5>
					<form method="post">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div>
						<input type="submit" name="login" class="btn btn-info" value="Login">
						<p>I dont have an account <a href="account.php">Click Here</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>


</body>
</html>