<?php 
	include("include/connection.php");

	if(isset($_POST['create'])){
		$fname = $_POST['fname'];
		$sname = $_POST['sname'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
		$country = $_POST['country'];
		$password = $_POST['pass'];
		$con_pass = $_POST['con_pass'];

		
		


		$error = array();

		if(empty($fname)){
			$error['ac'] = 'Enter First Name';
		}else if(empty($sname)){
			$error['ac'] = "Enter Last name";
		}else if(empty($uname)){
			$error['ac'] = "Enter Username";
		}else if(empty($email)){
			$error['ac'] = "Enter Email";
		}else if(empty($phone)){
			$error['ac'] = "Enter Phone No";
		}else if($gender == ""){
			$error['ac'] = "Enter Gender";
		}else if($country == ""){
			$error['ac'] = "Enter Country";
		}else if(empty($password)){
			$error['ac'] = "Enter Password";
		}else if($con_pass != $password){
			$error['ac'] = "Both Password do not match";
		}

		if(count($error)==0){
			$query = "INSERT INTO patient (firstname, surname, username, email, phone, gender, country, password, date_reg, profile) VALUES ('pratik', 'desai', 'pratik', 'asd@asd.com', '123456789', 'Male', 'India', 'pass', NOW(), 'asd.png');";

			$res = mysqli_query($connect,$query);
			if($res){
				header("Location: patientlogin.php");
			}
			else{
				echo "<script>alert('Failed')</script>";
			}
		}

	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
</head>
<body style="background-image: url(img/back.jpg); background-repeat: no-repeat; background-size: cover;">

	<?php 
		include("include/header.php");
	 ?>

	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-3"></div>
	 			<div class="col-md-6 my-2 jumbotron">
	 				<h5 class="text-center text-info my-2">Create Account</h5>

	 				<form method="post">
	 					<div class="form-group">
	 						<label>First Name</label>
	 						<input type="text" name="fname" autocomplete="off" placeholder="Enter FirstName" class="form-control">
	 					</div>
	 					<div class="form-group">
	 						<label>Last Name</label>
	 						<input type="text" name="sname" autocomplete="off" placeholder="Enter LastName" class="form-control">
	 					</div>
	 					<div class="form-group">
	 						<label>Username</label>
	 						<input type="text" name="uname" autocomplete="off" placeholder="Enter Username" class="form-control">
	 					</div>
	 					<div class="form-group">
	 						<label>Email</label>
	 						<input type="text" name="email" autocomplete="off" placeholder="Enter Email" class="form-control">
	 					</div>
	 					<div class="form-group">
	 						<label>Phone No</label>
	 						<input type="number" name="phone" autocomplete="off" placeholder="Enter Phone No" class="form-control">
	 					</div>
	 					<div class="form-group">
	 						<label>Gender</label>
	 						<select name="gender" class="form-control">
	 							<option value="">Select Your Gender</option>
	 							<option value="Male">Male</option>
	 							<option value="Female">Female</option>
	 						</select>
	 					</div>
	 					<div class="form-group">
	 						<label>Country</label>
	 						<select name="country" class="form-control">
	 							<option value="">Select Your Country</option>
	 							<option value="India">India</option>
	 							<option value="USA">USA</option>
	 						</select>
	 					</div>

	 					<div class="form-group">
	 						<label>Password</label>
	 						<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
	 					</div>
	 					<div class="form-group">
	 						<label>Confirm Password</label>
	 						<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
	 					</div>
	 					<input type="submit" name="create" value="Create Account" class="btn btn-info">
	 					<p>I already have an account <a href="patientlogin.php">Click Here</a></p>

	 				</form>
	 			</div>
	 			
	 		</div>
	 	</div>
	 </div>

</body>
</html>